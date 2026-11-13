#!/usr/bin/env python3
"""MYMI-GTM-007: ratcheting PHPUnit gate.

Reads a PHPUnit JUnit XML report and a baseline file of known failing tests.

Exit codes:
  0  every failing/erroring test is listed in the baseline
  1  at least one failing/erroring test is NOT in the baseline (new regression)
  2  the report is missing, unreadable, or contains zero tests (fail closed)

Baseline entries that now pass are reported as notices so they can be removed;
they do not fail the gate. Baseline format: one "Class::method" per line, where
data-provider cases keep PHPUnit's " with data set ..." suffix. Lines starting
with "#" and blank lines are ignored.

Stdlib only. Prints test identifiers, never test output bodies.
"""

import sys
import xml.etree.ElementTree as ET


def test_id(case):
    cls = case.get("class") or (case.get("classname") or "").replace(".", "\\")
    return f"{cls}::{case.get('name', '')}"


def load_baseline(path):
    entries = set()
    with open(path, encoding="utf-8") as fh:
        for raw in fh:
            line = raw.strip()
            if line and not line.startswith("#"):
                entries.add(line)
    return entries


def main(argv):
    if len(argv) != 4:
        print("usage: phpunit_baseline_gate.py <suite-name> <junit.xml> <baseline.txt>", file=sys.stderr)
        return 2
    suite, report, baseline_path = argv[1], argv[2], argv[3]

    try:
        root = ET.parse(report).getroot()
    except (OSError, ET.ParseError) as exc:
        print(f"::error::[{suite}] cannot read JUnit report {report}: {exc}")
        return 2

    cases = list(root.iter("testcase"))
    if not cases:
        print(f"::error::[{suite}] report contains zero tests; refusing to pass an empty suite")
        return 2

    try:
        baseline = load_baseline(baseline_path)
    except OSError as exc:
        print(f"::error::[{suite}] cannot read baseline {baseline_path}: {exc}")
        return 2

    failing = set()
    for case in cases:
        if case.find("failure") is not None or case.find("error") is not None:
            failing.add(test_id(case))
    executed = {test_id(c) for c in cases}

    new = sorted(failing - baseline)
    known = sorted(failing & baseline)
    fixed = sorted((baseline - failing) & executed)

    for t in known:
        print(f"::warning::[{suite}] known baseline failure (MYMI-GTM-007 debt): {t}")
    for t in fixed:
        print(f"::notice::[{suite}] baseline test now passes; remove it from the baseline: {t}")
    for t in new:
        print(f"::error::[{suite}] NEW failing test not in baseline: {t}")

    print(f"[{suite}] tests={len(cases)} failing={len(failing)} "
          f"baseline_known={len(known)} new={len(new)} fixed={len(fixed)}")
    return 1 if new else 0


if __name__ == "__main__":
    sys.exit(main(sys.argv))
