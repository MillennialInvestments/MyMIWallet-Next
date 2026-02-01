# Copilot Instructions for AIOps Codebase

## Overview
This document provides essential guidelines for AI coding agents working within the AIOps codebase. Understanding the architecture, workflows, and conventions is crucial for effective contributions.

## Architecture
- **Framework**: The project is built on **CodeIgniter 4**, a lightweight PHP framework. Familiarize yourself with its structure and conventions.
- **Key Components**:
  - **Commands**: Located in `app/Commands`, these are CLI commands that perform various operations. For example, `ops:commands:audit` checks for illegal constructors in command classes.
  - **Services**: Various services are implemented in the `app/Services` directory, handling business logic and data processing.
  - **Models**: Data models are found in `app/Models`, representing the application's data structure.

## Developer Workflows
- **Running Commands**: Use the `php spark` command to execute various operations. For example:
  - `php spark ops:commands:audit`: Audits command classes for compliance.
  - `php spark ops:aiops:init`: Initializes the AIOps PR factory, with options for dry runs and approvals.
- **Testing**: Ensure to run tests after making changes. Use PHPUnit for unit testing, configured in `phpunit.xml`.
- **Linting**: Use `php spark ops:commands:lint` to check for code quality and adherence to standards.

## Project-Specific Conventions
- **Command Structure**: Commands extend `SafeBaseCommand`, which provides safety features and common functionality. Always check for constructor safety when creating new commands.
- **File Organization**: Follow the established directory structure. Place new commands in `app/Commands/Ops` and ensure they are registered properly.

## Integration Points
- **External Dependencies**: The project relies on Composer for package management. Ensure to run `composer update` regularly to keep dependencies up to date.
- **Environment Configuration**: Use the `.env` file for environment-specific settings. Verify required secrets are configured in GitHub for production.

## Communication Patterns
- **Command Communication**: Commands often delegate tasks to other commands or services. For example, `ops:aiops:init` delegates to `ops:propose-pr` for PR creation.
- **Error Handling**: Implement error handling in commands to provide clear feedback to users. Use CLI methods to display messages appropriately.

## Conclusion
This document serves as a starting point for AI agents to navigate the AIOps codebase effectively. For further details, refer to the specific command implementations and the CodeIgniter documentation.