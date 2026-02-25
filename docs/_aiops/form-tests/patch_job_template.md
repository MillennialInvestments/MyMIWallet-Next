# AIOPS_PATCH_JOB_TITLE=FORM_TEST_TEMPLATE
AIOPS_OBJECTIVE=Autotest_form_submission_capture_logs_and_generate_patch_PR

## Test Context
- test_id: 0
- source_type: url|file|text
- source_value: ...

## Form Details
- action: ...
- method: ...

## Route Mapping
- route_match: ...
- handler: ...
- controller: ...

## Generated Payload
```json
{}
```

## Submission Result
- final_url: ...
- status: ...

## Response Headers (partial)
...

## Response Body (partial)
...

## Logs Snapshot (partial)
...

## Fix Instructions
- Identify the controller+method handling this route.
- Reproduce failure using payload above.
- Apply the minimal corrective patch.
