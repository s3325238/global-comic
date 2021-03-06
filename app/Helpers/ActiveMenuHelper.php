<?php

if (!function_exists('setSideBarActive')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function setSideBarActive($path, $active){
        return call_user_func_array('Request::is', (array) $path) ? $active : '';
    }
}

if (!function_exists('setPageTitle')) {
    function setPageTitle($path)
    {
        switch ($path) {
            case 'dashboard':
                return "Dashboard";
                break;
            case 'dashboard/task':
                return "Tasks Lists";
                break;
            case 'dashboard/logs':
                return 'Activity Logs';
                break;
            // User
            case 'dashboard/user':
                return "User Lists Management";
                break;
            case 'dashboard/user/create':
                return "Add new user";
                break;
            // Video
            case 'dashboard/video/pending':
                return 'Pending video list';
                break;
            case 'dashboard/video/personal':
                return 'Personal video list';
                break;
            case 'dashboard/video/create':
                return 'New video upload';
                break;
            // Group
            case 'dashboard/group':
                return "Groups Management";
                break;
            case 'dashboard/group/action/create':
                return "Add new group";
                break;
            case 'dashboard/group/action/leader':
                return "Add new leader";
                break;
            // Member
            case 'dashboard/member':
                return 'Member Mangament';
                break;
            case 'dashboard/member/create':
                return "Add new member";
                break;
            // Manga
            case 'dashboard/manga':
                return "Manga Management";
                break;
            case 'dashboard/manga/copyright':
                return "Copyright Management";
                break;
            case 'dashboard/manga/action/create':
                return "Add new manga";
                break;
            case 'dashboard/manga/action/trade_mark/create':
                return "Add new trade mark";
                break;
            // Role
            case 'dashboard/permission':
                return "Permission Lists";
                break;
            case 'dashboard/permission/create':
                return "Add new permission";
            default:
                if (call_user_func_array('Request::is', ['dashboard/group/*/edit'])) {
                    # code...
                    return "Edit group";
                    break;
                } else if (call_user_func_array('Request::is', ['dashboard/permission/*/edit'])) {
                    return "Edit permission";
                    break;
                } else if (call_user_func_array('Request::is', ['dashboard/manga/*/edit'])) {
                    return "Edit manga";
                    break;
                } else if (call_user_func_array('Request::is', ['dashboard/video/*/edit'])) {
                    return "Edit video";
                    break;
                }
                break;
        }
    }
}