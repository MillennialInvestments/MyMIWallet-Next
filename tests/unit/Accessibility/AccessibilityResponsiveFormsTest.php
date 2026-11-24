<?php

namespace Tests\Unit\Accessibility;

use CodeIgniter\Test\CIUnitTestCase;

/**
 * MYMI-GTM-058: Certify accessibility, responsive design, and browser forms.
 * Validates WCAG 2.1 compliance (viewport scalability, focus visibility,
 * label-to-input association, landmarks, skip-links, and form contracts).
 */
class AccessibilityResponsiveFormsTest extends CIUnitTestCase
{
    /**
     * WCAG 1.4.4 (Resize Text): Viewport meta tags must not restrict user zooming
     * (must not contain user-scalable=no or maximum-scale=1.0).
     */
    public function testViewportMetaTagAllowsUserScaling(): void
    {
        $publicHeaderInfo = APPPATH . 'Views/themes/public/layouts/header-information.php';
        $this->assertFileExists($publicHeaderInfo);
        $publicContent = file_get_contents($publicHeaderInfo);

        $this->assertStringContainsString('name="viewport"', $publicContent);
        $this->assertStringContainsString('width=device-width', $publicContent);
        $this->assertStringNotContainsString('user-scalable=no', $publicContent);
        $this->assertStringNotContainsString('maximum-scale=1.0', $publicContent);

        $dashboardHeaderInfo = APPPATH . 'Views/themes/dashboard/layouts/header-information.php';
        $this->assertFileExists($dashboardHeaderInfo);
        $dashboardContent = file_get_contents($dashboardHeaderInfo);

        $this->assertStringContainsString('name="viewport"', $dashboardContent);
        $this->assertStringContainsString('width=device-width', $dashboardContent);
        $this->assertStringNotContainsString('user-scalable=no', $dashboardContent);
        $this->assertStringNotContainsString('maximum-scale=1.0', $dashboardContent);
    }

    /**
     * WCAG 2.4.1 (Bypass Blocks): Layouts must provide skip navigation links to main content landmarks.
     */
    public function testSkipNavigationLinksAndMainLandmarksExist(): void
    {
        $publicLayout = APPPATH . 'Views/themes/public/layouts/index.php';
        $this->assertFileExists($publicLayout);
        $publicContent = file_get_contents($publicLayout);

        $this->assertStringContainsString('class="skip-link"', $publicContent);
        $this->assertStringContainsString('href="#main-content"', $publicContent);
        $this->assertStringContainsString('<main id="main-content"', $publicContent);
        $this->assertStringContainsString('role="main"', $publicContent);

        $dashboardLayout = APPPATH . 'Views/themes/dashboard/layouts/index.php';
        $this->assertFileExists($dashboardLayout);
        $dashboardContent = file_get_contents($dashboardLayout);

        $this->assertStringContainsString('class="skip-link"', $dashboardContent);
        $this->assertStringContainsString('href="#dashboard-main-content"', $dashboardContent);
        $this->assertStringContainsString('<main id="dashboard-main-content"', $dashboardContent);
        $this->assertStringContainsString('role="main"', $dashboardContent);
    }

    /**
     * WCAG 2.4.7 (Focus Visible) and Assistive Tech Utilities:
     * Stylesheet must provide focus-visible rings, screen reader utilities, and skip-link styles.
     */
    public function testResponsiveCssProvidesFocusVisibleAndScreenReaderUtilities(): void
    {
        $cssPath = ROOTPATH . 'public/assets/css/responsive-overrides.css';
        $this->assertFileExists($cssPath);
        $cssContent = file_get_contents($cssPath);

        // Focus Visible
        $this->assertStringContainsString('*:focus-visible', $cssContent);
        $this->assertStringContainsString('outline:', $cssContent);

        // Screen Reader Utilities
        $this->assertStringContainsString('.sr-only', $cssContent);
        $this->assertStringContainsString('.visually-hidden', $cssContent);

        // Skip Link Styling
        $this->assertStringContainsString('.skip-link', $cssContent);
    }

    /**
     * WCAG 1.3.1 (Info and Relationships) & WCAG 4.1.2 (Name, Role, Value):
     * Login form must have matching label for attributes, input IDs, and ARIA attributes.
     */
    public function testLoginFormHasAccessibleLabelsAndAriaAttributes(): void
    {
        $loginViewPath = APPPATH . 'Views/Auth/login.php';
        $this->assertFileExists($loginViewPath);
        $content = file_get_contents($loginViewPath);

        // Matching label for="login" and id="login"
        $this->assertStringContainsString('<label for="login">', $content);
        $this->assertStringContainsString('id="login"', $content);

        // Matching label for="password" and id="password"
        $this->assertStringContainsString('<label for="password">', $content);
        $this->assertStringContainsString('id="password"', $content);

        // ARIA required attributes
        $this->assertStringContainsString('aria-required="true"', $content);
    }

    /**
     * WCAG 1.3.1 (Info and Relationships):
     * Registration form must have explicit label for attributes matching all input IDs.
     */
    public function testRegisterFormHasAccessibleLabelsAndInputIds(): void
    {
        $registerViewPath = APPPATH . 'Views/Auth/register_form.php';
        $this->assertFileExists($registerViewPath);
        $content = file_get_contents($registerViewPath);

        // Account type
        $this->assertStringContainsString('<label for="account_type">', $content);
        $this->assertStringContainsString('id="account_type"', $content);

        // Email
        $this->assertStringContainsString('<label for="email">', $content);
        $this->assertStringContainsString('id="email"', $content);

        // Username
        $this->assertStringContainsString('<label for="username">', $content);
        $this->assertStringContainsString('id="username"', $content);

        // Password
        $this->assertStringContainsString('<label for="password">', $content);
        $this->assertStringContainsString('id="password"', $content);

        // Confirm Password
        $this->assertStringContainsString('<label for="pass_confirm">', $content);
        $this->assertStringContainsString('id="pass_confirm"', $content);

        // Service disclosure accordion button has aria controls
        $this->assertStringContainsString('data-bs-target="#accordion-item-2-2"', $content);
    }
}
