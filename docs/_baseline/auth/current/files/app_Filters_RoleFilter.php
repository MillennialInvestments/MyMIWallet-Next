<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Myth\Auth\Authorization\GroupModel;

class RoleFilter extends BaseFilter implements FilterInterface
{
    /**
     * @param array|null $arguments
     *
     * @return RedirectResponse|void
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        if (! function_exists('user_id') || ! user_id()) {
            redirect_url_store((string) current_url(), [
                'writer' => 'RoleFilter::before',
                'route' => trim((string) $request->getUri()->getPath(), '/'),
            ]);
            return redirect()->to('/login');
        }

        $groupModel = new GroupModel();
        $userId     = (int) user_id();
        $userGroups = $groupModel->getGroupsForUser($userId);

        log_message('debug', '[ROLE_FILTER] USER GROUPS: ' . json_encode($userGroups));

        $allowed = array_column($userGroups, 'name');

        if (in_array('admin', $allowed, true)) {
            return;
        }

        if (! empty($arguments) && ! array_intersect($arguments, $allowed)) {
            log_message('error', '[ROLE_FILTER] ACCESS DENIED', [
                'required'    => $arguments,
                'user_groups' => $allowed,
            ]);

            log_message('error', '[AUTH FAILURE]', [
                'url'     => current_url(),
                'user_id' => $userId,
                'ip'      => $request->getIPAddress(),
            ]);

            return redirect()->to('/dashboard')->with('error', 'Access denied.');
        }
    }


    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param array|null $arguments
     *
     * @return void
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
