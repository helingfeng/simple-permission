# simple-permission
Laravel 扩展包，让后端的菜单与权限控制如此轻松，基于角色的权限控制，简单所以高效

## Composer 安装

```shell
composer require helingfeng/simple-permission
```

```shell
php artisan vendor:publish
```

## 数据库迁移

```shell
php artisan migrate
php artisan db:seed --class=LaravelUsersSeeder

```

## 权限命令

- 获取当前数据库配置的所有菜单清单
```shell
# 所有菜单
php artisan command:menu

---------------- 
所有菜单列表        
---------------- 
-平台管理       
---应用总览     
------订单总览  
---数据报表     
------订单趋势  
------订单来源  
-网站设置       
---站点设置     
------页面导航  
------广告投放  
---------------- 
```

- 获取数据库配置的所有权限可选项
```shell
# 所有权限
php artisan command:permission

-------------------------------------------------- 
所有权限列表                                          
-------------------------------------------------- 
菜单:平台管理                                     
订单总览-查看   订单总览-导出                     
订单趋势-查看   订单趋势-导出                     
订单来源-查看   订单来源-导出                     
                                                
菜单:网站设置                                     
页面导航-查看   页面导航-编辑   页面导航-删除     
广告投放-查看   广告投放-编辑   广告投放-删除     
                                                
-------------------------------------------------- 
```

- 输出当前最新用户的拥有的权限与菜单
```shell
# 当前用户的菜单与权限
php artisan command:user

---------------- 
用户拥有菜单    
---------------- 
-平台管理       
---应用总览     
------订单总览  
-网站设置       
---站点设置     
------广告投放  
---------------- 

------------------------------------------------------------------------------------------ 
用户拥有权限                                                                              
------------------------------------------------------------------------------------------ 
website.setting.adv.show|platform.dashboard.orders.show|platform.dashboard.orders.export  
------------------------------------------------------------------------------------------ 
```

## 如何使用

- 路由中控制权限

对访问的路由进行权限配置，此处的权限标识与`menu.php`文件保持一致即可 
```markdown
Route::group(['middleware' => 'permission:platform.dashboard.orders.show'], function(Router $router){
    //... your router
});
```

- 页面模板中控制权限

自定义模板标签
```blade
@can('platform.dashboard.orders.export')
    // todo your code
@endcan
```