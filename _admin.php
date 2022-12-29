<?php 
# ***** BEGIN LICENSE BLOCK *****
#
# This file is part of Informations, a plugin for Dotclear 2
# Copyright 2007-2017 Moe (http://gniark.net/)
#
# Informations is free software; you can redistribute it and/or
# modify it under the terms of the GNU General Public License v2.0
# as published by the Free Software Foundation.
#
# Informations is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public
# License along with this program. If not, see
# <http://www.gnu.org/licenses/>.
#
# Icon (icon.png) and images are from Silk Icons :
# <http://www.famfamfam.com/lab/icons/silk/>
#
# ***** END LICENSE BLOCK *****

if (!defined('DC_CONTEXT_ADMIN')) {return;}

dcCore::app()->menu[dcAdmin::MENU_BLOG]->addItem(
    __('Informations'),
    dcCore::app()->adminurl->get('admin.plugin.info'),
    [dcPage::getPF('info/icon.png')],
    preg_match('/' . preg_quote(dcCore::app()->adminurl->get('admin.plugin.info')) . '(&.*)?$/', $_SERVER['REQUEST_URI']),
    dcCore::app()->auth->check(dcCore::app()->auth->makePermissions([dcAuth::PERMISSION_CONTENT_ADMIN]), dcCore::app()->blog->id)
);

/* Register favorite */
dcCore::app()->addBehavior('adminDashboardFavoritesV2', function (dcFavorites $favs) {
    $favs->register('info', [
        'title'       => __('Informations'),
        'url'         => dcCore::app()->adminurl->get('admin.plugin.info'),
        'small-icon'  => [dcPage::getPF('info/icon.png')],
        'large-icon'  => [dcPage::getPF('info/icon-big.png')],
        'permissions' => dcCore::app()->auth->makePermissions([dcAuth::PERMISSION_CONTENT_ADMIN]),
    ]);
});
