<?php

if (!function_exists('make_personal_video_data_table')) {
    function make_personal_video_data_table()
    {
        return '<div class="material-datatables">
        <table id="personal" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%"
            style="width:100%">
            <thead>
                <tr>
                    <th>Manga Name</th>
                    <th>Chapter</th>
                    <th>Video Name</th>
                    <th>Publish at</th>

                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Manga Name</th>
                    <th>Chapter</th>
                    <th>Video Name</th>
                    <th>Publish at</th>

                    <th class="text-center">Status</th>
                </tr>
            </tfoot>
        </table>
    </div>';
    }
}

if (!function_exists('make_publishing_video_data_table')) {
    function make_publishing_video_data_table()
    {
        return '<div class="material-datatables">
        <table id="published" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%"
            style="width:100%">
            <thead>
                <tr>
                    <th>Manga Name</th>
                    <th>Chapter</th>
                    <th>Video Name</th>
                    <th>Publish at</th>

                    <th class="disabled-sorting text-center">Actions</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Manga Name</th>
                    <th>Chapter</th>
                    <th>Video Name</th>
                    <th>Publish at</th>

                    <th class="text-center">Actions</th>
                </tr>
            </tfoot>
        </table>
    </div>';
    }
}

if (!function_exists('make_pending_video_data_table')) {
    function make_pending_video_data_table()
    {
        return '<div class="material-datatables">
        <table id="pending" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%"
            style="width:100%">
            <thead>
                <tr>
                    <th>Manga Name</th>
                    <th>Chapter</th>
                    <th>Upload by</th>
                    <th>Created At</th>

                    <th class="disabled-sorting text-center">Actions</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Manga Name</th>
                    <th>Chapter</th>
                    <th>Upload by</th>
                    <th>Created At</th>

                    <th class="text-center">Actions</th>
                </tr>
            </tfoot>
        </table>
    </div>';
    }
}

if (!function_exists('make_member_list_data_table')) {
    function make_member_list_data_table()
    {
        return '<div class="material-datatables">
        <table id="member" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%"
            style="width:100%">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Position</th>
                    <th>Status</th>
                    <th>Updated At</th>

                    <th class="disabled-sorting text-center">Actions</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Position</th>
                    <th>Status</th>
                    <th>Updated At</th>

                    <th class="text-center">Actions</th>
                </tr>
            </tfoot>
        </table>
    </div>';
    }
}

if (!function_exists('make_causer_log_data_table')) {
    function make_causer_log_data_table($id)
    {
        return '<div class="material-datatables">
        <table id="' . $id . '" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%"
            style="width:100%">
            <thead>
                <tr>
                    <th>ID&nbsp;&nbsp;&nbsp;</th>
                    <th>Description</th>
                    <th>Edit by</th>
                    <th>Updated At</th>

                    <th class="disabled-sorting text-center">Actions</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>ID&nbsp;&nbsp;&nbsp;</th>
                    <th>Description</th>
                    <th>Edit by</th>
                    <th>Updated At</th>

                    <th class="text-center">Actions</th>
                </tr>
            </tfoot>
        </table>
    </div>';
    }
}

if (!function_exists('log_data_table')) {
    function make_log_data_table($id)
    {
        return '<div class="row">
            <div class="col-md-12">
                <form action="' . route('api.log.user.delete', 'App\User') . '" method="post">
                    ' . csrf_field() . '
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger">Clean Self registered user logs</button>
                </form>
            </div>
        </div>
        <div class="material-datatables">
        <table id="' . $id . '" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%"
            style="width:100%">
            <thead>
                <tr>
                    <th>ID&nbsp;&nbsp;&nbsp;</th>
                    <th>Description</th>
                    <th>Updated At</th>

                    <th class="disabled-sorting text-center">Actions</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>ID&nbsp;&nbsp;&nbsp;</th>
                    <th>Description</th>
                    <th>Updated At</th>

                    <th class="text-center">Actions</th>
                </tr>
            </tfoot>
        </table>
    </div>';
    }
}

if (!function_exists('make_user_data_table')) {
    function make_user_data_table($id)
    {
        return '<div class="material-datatables">
        <table id="' . $id . '" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%"
            style="width:100%">
            <thead>
                <tr>
                    <th>ID&nbsp;&nbsp;&nbsp;</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Updated At</th>

                    <th class="disabled-sorting text-center">Actions</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>ID&nbsp;&nbsp;&nbsp;</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Updated At</th>

                    <th class="text-center">Actions</th>
                </tr>
            </tfoot>
        </table>
    </div>';
    }
}

if (!function_exists('make_manga_data_table')) {
    function make_manga_data_table($id)
    {
        return '<div class="material-datatables">
        <table id="' . $id . '" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%"
            style="width:100%">
            <thead>
                <tr>
                    <th>ID&nbsp;&nbsp;&nbsp;</th>
                    <th>Manga Name</th>
                    <th>Updated At</th>

                    <th class="disabled-sorting text-center">Actions</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>ID&nbsp;&nbsp;&nbsp;</th>
                    <th>Manga Name</th>
                    <th>Updated At</th>

                    <th class="text-center">Actions</th>
                </tr>
            </tfoot>
        </table>
    </div>';
    }
}

if (!function_exists('make_copyright_data_table')) {
    function make_copyright_data_table($id)
    {
        return '<div class="material-datatables">
        <table id="' . $id . '" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%"
            style="width:100%">
            <thead>
                <tr>
                    <th>ID&nbsp;&nbsp;&nbsp;</th>
                    <th>Manga Name</th>
                    <th>Registered by</th>
                    <th>Updated At</th>

                    <th class="disabled-sorting text-center">Actions</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>ID&nbsp;&nbsp;&nbsp;</th>
                    <th>Manga Name</th>
                    <th>Registered by</th>
                    <th>Updated At</th>

                    <th class="text-center">Actions</th>
                </tr>
            </tfoot>
        </table>
    </div>';
    }
}

if (!function_exists('make_group_data_table')) {

    function make_group_data_table($id)
    {
        # code...
        return '<div class="material-datatables">
                <table id="' . $id . '" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                <thead>
                    <tr>
                    <th>ID&nbsp;&nbsp;&nbsp;</th>
                    <th>Name</th>
                    <th>Leader Email</th>
                    <th>Follows</th>
                    <th>Points</th>
                    <th>Created At</th>
                    <th class="disabled-sorting text-center">Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID&nbsp;&nbsp;&nbsp;</th>
                        <th>Name</th>
                        <th>Leader Email</th>
                        <th>Follows</th>
                        <th>Points</th>
                        <th>Created At</th>

                        <th class="text-center">Actions</th>
                    </tr>
                </tfoot>
            </table>
        </div>';
    }
}
