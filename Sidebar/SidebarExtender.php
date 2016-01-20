<?php

namespace Modules\Formbuilder\Sidebar;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Contracts\Authentication;

class SidebarExtender implements \Maatwebsite\Sidebar\SidebarExtender
{
    /**
     * @var Authentication
     */
    protected $auth;

    /**
     * @param Authentication $auth
     *
     * @internal param Guard $guard
     */
    public function __construct(Authentication $auth)
    {
        $this->auth = $auth;
    }

    /**
     * @param Menu $menu
     *
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::sidebar.content'), function (Group $group) {
            $group->item(trans('formbuilder::formbuilder.title.form builder'), function (Item $item) {
                $item->icon('fa fa-cubes');
                $item->weight(50);
                $item->route('admin.formbuilder.formbuilder.index');
                $item->authorize(
                    $this->auth->hasAccess('formbuilder.formbuilder.index')
                );
            });
        });

        return $menu;
    }
}
