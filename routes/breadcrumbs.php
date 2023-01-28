<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

Breadcrumbs::for('admin.index', function (BreadcrumbTrail $trail): void {
    $trail->push('Dashboard', route('admin.index'));
});
Breadcrumbs::for('admin.users.index', function (BreadcrumbTrail $trail): void {
    $trail->parent('admin.index');
    $trail->push('Users', route('admin.users.index'));
});
// Post
Breadcrumbs::for('admin.posts.index', function (BreadcrumbTrail $trail): void {
    $trail->parent('admin.index');
    $trail->push('Posts', route('admin.posts.index'));
});
Breadcrumbs::for('admin.posts.create', function (BreadcrumbTrail $trail): void {
    $trail->parent('admin.posts.index');

    $trail->push('Add new post', route('admin.posts.create'));
});
Breadcrumbs::for('admin.posts.edit', function (BreadcrumbTrail $trail, Post $post): void {
    $trail->parent('admin.posts.index');

    $trail->push($post->title, route('admin.posts.edit', $post));
});
// Category
Breadcrumbs::for('admin.categories.index', function (BreadcrumbTrail $trail): void {
    $trail->parent('admin.index');
    $trail->push('Categories', route('admin.categories.index'));
});
Breadcrumbs::for('admin.categories.create', function (BreadcrumbTrail $trail): void {
    $trail->parent('admin.categories.index');

    $trail->push('Add new category', route('admin.posts.create'));
});
Breadcrumbs::for('admin.categories.edit', function (BreadcrumbTrail $trail, Category $category): void {
    $trail->parent('admin.categories.index');

    $trail->push($category->title ?? 'Edit Category', route('admin.categories.edit', $category));
});
// Tag
Breadcrumbs::for('admin.tags.index', function (BreadcrumbTrail $trail): void {
    $trail->parent('admin.index');
    $trail->push('Tags', route('admin.tags.index'));
});
Breadcrumbs::for('admin.tags.create', function (BreadcrumbTrail $trail): void {
    $trail->parent('admin.tags.index');

    $trail->push('Add new tag', route('admin.tags.create'));
});
Breadcrumbs::for('admin.tags.edit', function (BreadcrumbTrail $trail, Tag $post): void {
    $trail->parent('admin.tags.index');

    $trail->push($post->title, route('admin.tags.edit', $post));
});
// Role
Breadcrumbs::for('admin.roles.index', function (BreadcrumbTrail $trail): void {
    $trail->parent('admin.index');
    $trail->push('Roles', route('admin.roles.index'));
});
Breadcrumbs::for('admin.roles.create', function (BreadcrumbTrail $trail): void {
    $trail->parent('admin.roles.index');

    $trail->push('Add new role', route('admin.roles.create'));
});
Breadcrumbs::for('admin.roles.edit', function (BreadcrumbTrail $trail, Role $post): void {
    $trail->parent('admin.roles.index');

    $trail->push($post->name, route('admin.roles.edit', $post));
});
// Permission
Breadcrumbs::for('admin.permissions.index', function (BreadcrumbTrail $trail): void {
    $trail->parent('admin.index');
    $trail->push('Permissions', route('admin.permissions.index'));
});
Breadcrumbs::for('admin.permissions.create', function (BreadcrumbTrail $trail): void {
    $trail->parent('admin.permissions.index');

    $trail->push('Add new permission', route('admin.permissions.create'));
});
Breadcrumbs::for('admin.permissions.edit', function (BreadcrumbTrail $trail, Permission $post): void {
    $trail->parent('admin.permissions.index');

    $trail->push($post->name, route('admin.permissions.edit', $post));
});
// profile
Breadcrumbs::for('admin.profile.index', function (BreadcrumbTrail $trail): void {
    $trail->parent('admin.index');
    $trail->push('Profile', route('admin.profile.index'));
});
// change password
Breadcrumbs::for('admin.password.index', function (BreadcrumbTrail $trail): void {
    $trail->parent('admin.index');
    $trail->push('Change Password', route('admin.password.index'));
});
