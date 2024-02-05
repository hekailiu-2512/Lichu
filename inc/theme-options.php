<?php

/**
 * 主题选项
 * @author Lichu <hekailiu@foxmail.com>
 * @license GPL-3.0 License
 * @version 2024.01.17
 */

defined('ABSPATH') || exit;

$prefix = 'Lichu_options';

if (!function_exists('Lichu_option')) {
    function Lichu_option($name, $default = false)
    {

        $options = get_option('Lichu_options');

        if (isset($options[$name])) {
            return $options[$name];
        }

        return $default;
    }
}

function getrobots()
{
    $site_url = parse_url(site_url());
    $web_url = get_bloginfo('url');
    $path = (!empty($site_url['path'])) ? $site_url['path'] : '';

    $robots = "User-agent: *\n\n";
    $robots .= "Disallow: $path/wp-admin/\n";
    $robots .= "Disallow: $path/wp-includes/\n";
    $robots .= "Disallow: $path/wp-content/plugins/\n";
    $robots .= "Disallow: $path/wp-content/themes/\n\n";
    $robots .= "Sitemap: $web_url/wp-sitemap.xml\n";

    return $robots;
}

CSF::createOptions($prefix, array(
    'menu_title' => __('主题设置', 'Lichu'),
    'menu_slug' => 'Lichu-options',
    'show_search' => false,
    'show_all_options' => false,
    'sticky_header' => false,
    'admin_bar_menu_icon' => 'dashicons-admin-generic',
    'framework_title' => '主题设置<small style="margin-left:10px">Lichu v' . THEME_VERSION . '</small>',
    'theme' => 'light',
    'footer_credit' => '感谢使用 <a target="_blank" href="https://github.com/hekailiu-2512/Lichu">Lichu</a> 主题开始创作，欢迎加入交流群：<a target="_blank" href="https://qm.qq.com/cgi-bin/qm/qr?k=_7pE5U4pbq4j2xeu_cyZqvasEd_i9wTf">618958939</a>、<a target="_blank" href="https://qm.qq.com/cgi-bin/qm/qr?k=8Okzvj3TP67642FTRvC1mKT7f8L4NOrk">839687348</a>、<a target="_blank" href="https://qm.qq.com/cgi-bin/qm/qr?k=b37-78PbXYvTdoUZq9rW-nEF6CEl4wBv">852844975</a>',
));

CSF::createSection($prefix, array(
    'id' => 'global_fields',
    'title' => __('全站配置', 'Lichu'),
    'icon' => 'fas fa-rocket',
));

CSF::createSection($prefix, array(
    'parent' => 'global_fields',
    'title' => __('功能配置', 'Lichu'),
    'icon' => 'fas fa-arrow-right',
    'fields' => array(
        array(
            'id' => 'g_adminbar',
            'type' => 'switcher',
            'title' => __('前台管理员导航', 'Lichu'),
            'subtitle' => __('启用/禁用前台管理员导航', 'Lichu'),
            'default' => true,
        ),
        array(
            'id' => 'g_login',
            'type' => 'switcher',
            'title' => __('侧边栏后台入口', 'Lichu'),
            'subtitle' => __('启用/禁用个人简介头像进入后台功能', 'Lichu'),
            'default' => true,
        ),
        array(
            'id' => 'g_sticky',
            'type' => 'switcher',
            'title' => __('侧边栏随动', 'Lichu'),
            'subtitle' => __('启用/禁用小工具侧边栏随动功能', 'Lichu'),
            'default' => false,
        ),
        array(
            'id' => 'g_search',
            'type' => 'switcher',
            'title' => __('搜索增强', 'Lichu'),
            'subtitle' => __('启用/禁用仅搜索文章标题', 'Lichu'),
            'default' => false,
        ),
        array(
            'id' => 'g_thumbnail',
            'type' => 'switcher',
            'title' => __('特色图片', 'Lichu'),
            'subtitle' => __('启用/禁用文章特色图片', 'Lichu'),
            'default' => true,
        ),
        array(
            'id' => 'g_rip',
            'type' => 'switcher',
            'title' => __('哀悼功能', 'Lichu'),
            'subtitle' => __('启用/禁用站点首页黑白功能', 'Lichu'),
            'default' => false,
        ),
        array(
            'id' => 'g_animate',
            'type' => 'switcher',
            'title' => __('CSS 动画库', 'Lichu'),
            'subtitle' => __('启用/禁用 animate.css 效果', 'Lichu'),
            'default' => false,
        ),
        array(
            'id' => 'g_fontawesome',
            'type' => 'switcher',
            'title' => __('Font Awesome', 'Lichu'),
            'subtitle' => __('启用/禁用 Font Awesome Free 字体', 'Lichu'),
            'default' => false,
        ),
        array(
            'id' => 'g_cdn',
            'type' => 'switcher',
            'title' => __('静态资源加速', 'Lichu'),
            'subtitle' => __('启用/禁用静态资源加速（jsDelivr）', 'Lichu'),
            'default' => false,
        ),
        array(
            'id' => 'g_renameimg',
            'type' => 'switcher',
            'title' => __('自定义图片类型的文件名', 'Lichu'),
            'subtitle' => __('启用/禁用 图片类型的文件名改为 MD5 值', 'Lichu'),
            'default' => false,
        ),
        array(
            'id' => 'g_removeimgsize',
            'type' => 'switcher',
            'title' => __('禁止生成缩略图', 'Lichu'),
            'subtitle' => __('启用/禁用生成多种尺寸图片资源', 'Lichu'),
            'default' => false,
        ),
        array(
            'id' => 'g_gutenberg',
            'type' => 'switcher',
            'title' => __('Gutenberg 编辑器', 'Lichu'),
            'subtitle' => __('启用/禁用 Gutenberg 编辑器', 'Lichu'),
            'default' => false,
        ),
        array(
            'id' => 'g_page_lightgallery',
            'type' => 'switcher',
            'title' => __('页面图片灯箱', 'Lichu'),
            'subtitle' => __('启用/禁用页面图片灯箱功能', 'Lichu'),
            'default' => true,
        ),
        array(
            'id' => 'g_admin_notice',
            'type' => 'switcher',
            'title' => __('后台管理员通知', 'Lichu'),
            'subtitle' => __('启用/禁用后台管理员通知', 'Lichu'),
            'default' => true,
        ),
        array(
            'id' => 'g_excerpt_length',
            'type' => 'text',
            'title' => __('文章简介缩略', 'Lichu'),
            'subtitle' => __('文章简介显示的字符数量', 'Lichu'),
            'default' => '260',
        ),
        array(
            'id' => 'g_replace_gravatar_url_fieldset',
            'type' => 'fieldset',
            'fields' => array(
                array(
                    'type' => 'subheading',
                    'content' => __('Gravatar 加速服务', 'Lichu'),
                ),
                array(
                    'id' => 'g_replace_gravatar_url',
                    'type' => 'switcher',
                    'title' => __('功能开关', 'Lichu'),
                    'subtitle' => __('开启/关闭 Gravatar 加速服务功能', 'Lichu'),
                ),
                array(
                    'id' => 'g_select_gravatar_server',
                    'type' => 'select',
                    'title' => __('Gravatar 加速服务地址', 'Lichu'),
                    'subtitle' => __('请选择 Gravatar 加速服务地址', 'Lichu'),
                    'options' => array(
                        'loli' => __('Loli 加速服务', 'Lichu'),
                        'geekzu' => __('极客族加速服务', 'Lichu'),
                        'other' => __('自定义加速服务', 'Lichu'),
                    ),
                    'desc' => __('国内用户推荐「极客族加速服务」，海外用户推荐「Loli 加速服务」。', 'Lichu'),
                    'dependency' => array('g_replace_gravatar_url', '==', 'true'),
                ),
                array(
                    'id' => 'g_custom_gravatar_server',
                    'type' => 'text',
                    'title' => __('自定义 Gravatar 加速服务地址', 'Lichu'),
                    'subtitle' => __('请输入 Gravatar 加速服务地址', 'Lichu'),
                    'desc' => __('直接输入网址即可，不需要协议头和最后的斜杠。', 'Lichu'),
                    'placeholder' => 'secure.gravatar.com',
                    'dependency' => array('g_replace_gravatar_url|g_select_gravatar_server', '==|==', 'true|other'),
                ),
            ),
            'default' => array(
                'g_replace_gravatar_url' => 1,
                'g_select_gravatar_server' => 'geekzu',
            )
        ),
        array(
            'id' => 'g_renameother_fieldset',
            'type' => 'fieldset',
            'fields' => array(
                array(
                    'type' => 'subheading',
                    'content' => __('附件重命名', 'Lichu'),
                ),
                array(
                    'id' => 'g_renameother',
                    'type' => 'switcher',
                    'title' => __('功能开关', 'Lichu'),
                    'subtitle' => __('开启/关闭附件重命名', 'Lichu'),
                    'text_on' => __('开启', 'Lichu'),
                    'text_off' => __('关闭', 'Lichu'),
                ),
                array(
                    'id' => 'g_renameother_prdfix',
                    'type' => 'text',
                    'title' => __('文件前缀', 'Lichu'),
                    'subtitle' => __('前缀与文件名之间会用 - 连接', 'Lichu'),
                ),
                array(
                    'id' => 'g_renameother_mime',
                    'type' => 'text',
                    'title' => __('文件类型', 'Lichu'),
                    'subtitle' => __('每个类型之间用 | 隔开', 'Lichu'),
                ),
            ),
            'default' => array(
                'g_renameother' => false,
                'g_renameother_prdfix' => 'Lichu',
                'g_renameother_mime' => 'tar|zip|gz|gzip|rar|7z',
            ),
        ),
        array(
            'id' => 'g_wechat_fieldset',
            'type' => 'fieldset',
            'fields' => array(
                array(
                    'type' => 'subheading',
                    'content' => __('微信二维码', 'Lichu'),
                ),
                array(
                    'id' => 'g_wechat',
                    'type' => 'switcher',
                    'title' => __('功能开关', 'Lichu'),
                    'subtitle' => __('开启/关闭微信二维码', 'Lichu'),
                    'text_on' => __('开启', 'Lichu'),
                    'text_off' => __('关闭', 'Lichu'),
                ),
                array(
                    'id' => 'g_wechat_img',
                    'type' => 'upload',
                    'title' =>  __('二维码图片', 'Lichu'),
                    'library' => 'image',
                    'preview' => true,
                    'subtitle' => __('浮动显示在页面右下角', 'Lichu'),
                ),
            ),
            'default' => array(
                'g_wechat' => false,
                'g_wechat_img' => get_template_directory_uri() . '/assets/img/200.png',
            ),
        ),
    ),
));

CSF::createSection($prefix, array(
    'parent' => 'global_fields',
    'title' => __('颜色配置', 'Lichu'),
    'icon' => 'fas fa-arrow-right',
    'fields' => array(
        array(
            'id' => 'g_background',
            'type' => 'color',
            'default' => '#f5f5f5',
            'title' =>  __('全站背景颜色', 'Lichu'),
            'subtitle' => __('全站页面的背景颜色', 'Lichu'),
        ),
        array(
            'id' => 'g_nav',
            'type' => 'color',
            'default' => '#ffffff',
            'title' =>  __('导航栏文字颜色', 'Lichu'),
            'subtitle' => __('导航栏中站点标题以及一级导航的颜色', 'Lichu'),
        ),
        array(
            'id' => 'g_chrome',
            'type' => 'color',
            'default' => '#282a2c',
            'title' =>  __('Chrome 导航栏颜色', 'Lichu'),
            'subtitle' => __('移动端 Chrome 浏览器导航栏颜色', 'Lichu'),
        ),
    ),
));

CSF::createSection($prefix, array(
    'parent' => 'global_fields',
    'title' => __('图片配置', 'Lichu'),
    'icon' => 'fas fa-arrow-right',
    'fields' => array(
        array(
            'id' => 'g_logo',
            'type' => 'upload',
            'title' => __('站点 Logo', 'Lichu'),
            'library' => 'image',
            'preview' => true,
            'subtitle' => __('不上传图片则显示站点标题', 'Lichu'),
        ),
        array(
            'id' => 'g_icon',
            'type' => 'upload',
            'title' =>  __('Favicon 图标', 'Lichu'),
            'library' => 'image',
            'preview' => true,
            'subtitle' => __('浏览器收藏夹和地址栏中显示的图标', 'Lichu'),
        ),
        array(
            'id' => 'g_404',
            'type' => 'upload',
            'title' =>  __('404 页面图片', 'Lichu'),
            'library' => 'image',
            'preview' => true,
            'default' => get_template_directory_uri() . '/assets/img/404.jpg',
            'subtitle' => __('图片显示出来是 404 的形状', 'Lichu'),
        ),
        array(
            'id' => 'g_nothing',
            'type' => 'upload',
            'title' =>  __('无内容图片', 'Lichu'),
            'library' => 'image',
            'preview' => true,
            'default' => get_template_directory_uri() . '/assets/img/nothing.svg',
            'subtitle' => __('当搜索不到文章或分类没有文章时显示', 'Lichu'),
        ),
        array(
            'id' => 'g_postthumbnail',
            'type' => 'upload',
            'title' =>  __('默认特色图', 'Lichu'),
            'library' => 'image',
            'preview' => true,
            'default' => get_template_directory_uri() . '/assets/img/default.jpg',
            'subtitle' => __('当文章中没有图片且没有特色图时显示', 'Lichu'),
        ),
    ),
));

CSF::createSection($prefix, array(
    'parent' => 'global_fields',
    'title' => __('首页轮播', 'Lichu'),
    'icon' => 'fas fa-arrow-right',
    'fields' => array(
        array(
            'id' => 'g_carousel',
            'type' => 'switcher',
            'title' => __('功能开关', 'Lichu'),
            'subtitle' => __('开启/关闭首页轮播功能', 'Lichu'),
            'text_on' => __('开启', 'Lichu'),
            'text_off' => __('关闭', 'Lichu'),
            'default' => false,
        ),
        array(
            'id' => 'carousel_group',
            'type' => 'group',
            'title' => '首页轮播',
            'subtitle' => '点击添加轮播内容，最多添加 7 个轮播内容',
            'min' => 1,
            'max' => 7,
            'fields' => array(
                array(
                    'id' => 'c_id',
                    'type' => 'text',
                    'title' =>  __('唯一标识', 'Lichu'),
                    'subtitle' =>  __('仅用于轮播标识，可以作为备注使用', 'Lichu'),
                ),
                array(
                    'id' => 'c_img',
                    'type' => 'upload',
                    'title' => __('轮播图片', 'Lichu'),
                    'subtitle' =>  __('可以直接填写图片链接，也可以上传图片', 'Lichu'),
                    'library' => 'image',
                    'preview' => true,
                ),
                array(
                    'id' => 'c_url',
                    'type' => 'text',
                    'title' =>  __('网址链接', 'Lichu'),
                    'subtitle' =>  __('需要填写完整的链接地址，包含协议头', 'Lichu'),
                ),
                array(
                    'id' => 'c_title',
                    'type' => 'text',
                    'title' =>  __('轮播标题', 'Lichu'),
                    'subtitle' =>  __('选填项目，如果不填则不显示', 'Lichu'),
                ),
                array(
                    'id' => 'c_subtitle',
                    'type' => 'textarea',
                    'title' =>  __('轮播简介', 'Lichu'),
                    'subtitle' =>  __('选填项目，如果不填则不显示', 'Lichu'),
                ),
                array(
                    'id' => 'c_color',
                    'type' => 'color',
                    'default' => '#000',
                    'title' =>  __('文字颜色', 'Lichu'),
                    'subtitle' => __('轮播标题和简介的颜色', 'Lichu'),
                ),
            ),
        ),
    )
));

CSF::createSection($prefix, array(
    'parent' => 'global_fields',
    'title' => __('第三方配置', 'Lichu'),
    'icon' => 'fas fa-arrow-right',
    'fields' => array(
        array(
            'type' => 'notice',
            'style' => 'info',
            'content' => '提示：<strong>DogeCloud 云存储</strong> 与 <strong>火山引擎 ImageX</strong>请勿同时开启！',
        ),
        array(
            'id' => 'g_cos_fieldset',
            'type' => 'fieldset',
            'fields' => array(
                array(
                    'type' => 'subheading',
                    'content' => __('DogeCloud 云存储', 'Lichu'),
                ),
                array(
                    'type' => 'submessage',
                    'style' => 'info',
                    'content' => 'DogeCloud 云存储提供<strong> 10 GB </strong>的免费存储额度，<strong> 20 GB </strong>每月的免费 CDN 额度，<a target="_blank" href="https://console.dogecloud.com/register.html?iuid=614">立即注册</a>',
                ),
                array(
                    'id' => 'g_cos',
                    'type' => 'switcher',
                    'title' => __('功能开关', 'Lichu'),
                    'subtitle' => __('开启/关闭 DogeCloud 云存储', 'Lichu'),
                    'text_on' => __('开启', 'Lichu'),
                    'text_off' => __('关闭', 'Lichu'),
                ),
                array(
                    'id' => 'g_cos_bucketname',
                    'type' => 'text',
                    'title' => __('空间名称', 'Lichu'),
                    'subtitle' => __('空间名称可在空间基本信息中查看', 'Lichu'),
                    'desc' => __('<a target="_blank" href="https://console.dogecloud.com/oss/list">点击这里</a>查询空间名称', 'Lichu'),
                ),
                array(
                    'id' => 'g_cos_url',
                    'type' => 'text',
                    'title' => __('加速域名', 'Lichu'),
                    'subtitle' => __('域名结尾不要添加 /', 'Lichu'),
                    'desc' => __('<a target="_blank" href="https://console.dogecloud.com/oss/list">点击这里</a>查询加速域名', 'Lichu'),
                ),
                array(
                    'id' => 'g_cos_accesskey',
                    'type' => 'text',
                    'title' => __('AccessKey', 'Lichu'),
                    'subtitle' => __('出于安全考虑，建议周期性地更换密钥', 'Lichu'),
                    'desc' => __('<a target="_blank" href="https://console.dogecloud.com/user/keys">点击这里</a>查询 AccessKey', 'Lichu'),
                ),
                array(
                    'id' => 'g_cos_secretkey',
                    'type' => 'text',
                    'attributes' => array(
                        'type' => 'password',
                    ),
                    'title' => __('SecretKey', 'Lichu'),
                    'subtitle' => __('出于安全考虑，建议周期性地更换密钥', 'Lichu'),
                    'desc' => __('<a target="_blank" href="https://console.dogecloud.com/user/keys">点击这里</a>查询 SecretKey', 'Lichu'),
                ),
            ),
            'default' => array(
                'g_cos' => false,
                'g_cos_bucketname' => '',
                'g_cos_url' => '',
                'g_cos_accesskey' => '',
                'g_cos_secretkey' => '',
            ),
        ),
        array(
            'id' => 'g_imgx_fieldset',
            'type' => 'fieldset',
            'fields' => array(
                array(
                    'type' => 'subheading',
                    'content' => __('火山引擎 ImageX', 'Lichu'),
                ),
                array(
                    'type' => 'submessage',
                    'style' => 'info',
                    'content' => '火山引擎 ImageX 提供<strong> 10 GB </strong>的免费存储额度，<strong> 10 GB </strong>每月的免费 CDN 额度，<strong> 20 TB </strong>每月的图像处理额度，<a target="_blank" href="https://www.volcengine.com/products/imagex?utm_content=ImageX&utm_medium=i4vj9y&utm_source=u7g4zk&utm_term=ImageX-Lichu">立即注册</a>',
                ),
                array(
                    'id' => 'g_imgx',
                    'type' => 'switcher',
                    'title' => __('功能开关', 'Lichu'),
                    'subtitle' => __('开启/关闭 火山引擎 ImageX', 'Lichu'),
                    'text_on' => __('开启', 'Lichu'),
                    'text_off' => __('关闭', 'Lichu'),
                ),
                array(
                    'id' => 'g_imgx_region',
                    'type' => 'select',
                    'title' => __('加速地域', 'Lichu'),
                    'subtitle' => __('加速地域在创建服务的时候进行选择', 'Lichu'),
                    'desc' => __('<a target="_blank" href="https://console.volcengine.com/imagex/service_manage/">点击这里</a>查询加速地域', 'Lichu'),
                    'options' => array(
                        'cn-north-1' => __('国内', 'Lichu'),
                        'us-east-1' => __('美东', 'Lichu'),
                        'ap-singapore-1' => __('新加坡', 'Lichu')
                    ),
                ),
                array(
                    'id' => 'g_imgx_serviceid',
                    'type' => 'text',
                    'title' => __('服务 ID', 'Lichu'),
                    'subtitle' => __('服务 ID 可在图片服务管理中查看', 'Lichu'),
                    'desc' => __('<a target="_blank" href="https://console.volcengine.com/imagex/service_manage/">点击这里</a>查询服务 ID', 'Lichu'),
                ),
                array(
                    'id' => 'g_imgx_url',
                    'type' => 'text',
                    'title' => __('加速域名', 'Lichu'),
                    'subtitle' => __('域名结尾不要添加 /', 'Lichu'),
                    'desc' => __('<a target="_blank" href="https://console.volcengine.com/imagex/service_manage/">点击这里</a>查询加速域名', 'Lichu'),
                ),
                array(
                    'id' => 'g_imgx_tmp',
                    'type' => 'text',
                    'title' => __('处理模板', 'Lichu'),
                    'subtitle' => __('处理模板可在图片处理配置中查看', 'Lichu'),
                    'desc' => __('<a target="_blank" href="https://console.volcengine.com/imagex/image_template/">点击这里</a>查询处理模板', 'Lichu'),
                ),
                array(
                    'id' => 'g_imgx_accesskey',
                    'type' => 'text',
                    'title' => __('AccessKey', 'Lichu'),
                    'subtitle' => __('出于安全考虑，建议周期性地更换密钥', 'Lichu'),
                    'desc' => __('<a target="_blank" href="https://console.volcengine.com/iam/keymanage/">点击这里</a>查询 AccessKey', 'Lichu'),
                ),
                array(
                    'id' => 'g_imgx_secretkey',
                    'type' => 'text',
                    'attributes' => array(
                        'type' => 'password',
                    ),
                    'title' => __('SecretKey', 'Lichu'),
                    'subtitle' => __('出于安全考虑，建议周期性地更换密钥', 'Lichu'),
                    'desc' => __('<a target="_blank" href="https://console.volcengine.com/iam/keymanage/">点击这里</a>查询 SecretKey', 'Lichu'),
                ),
            ),
            'default' => array(
                'g_imgx' => false,
                'g_imgx_region' => 'cn-north-1',
                "g_imgx_serviceid" => "",
                "g_imgx_url" => "",
                "g_imgx_tmp" => "",
                "g_imgx_accesskey" => "",
                "g_imgx_secretkey" => "",
            ),
        ),
    ),
));

CSF::createSection($prefix, array(
    'title' => __('收录配置', 'Lichu'),
    'icon' => 'fas fa-camera',
    'fields' => array(
        array(
            'id' => 'seo_shareimg',
            'type' => 'upload',
            'title' =>  __('分享图片', 'Lichu'),
            'library' => 'image',
            'preview' => true,
            'default' => get_template_directory_uri() . '/assets/img/default.jpg',
            'subtitle' => __('用于搜索引擎或社交工具抓取时使用', 'Lichu'),
        ),
        array(
            'id' => 'seo_keywords',
            'type' => 'text',
            'title' => __('关键词', 'Lichu'),
            'subtitle' =>  __('每个关键词之间需要用 , 分割', 'Lichu'),
        ),
        array(
            'id' => 'seo_description',
            'type' => 'textarea',
            'title' => __('站点描述', 'Lichu'),
            'subtitle' =>  __('网站首页的描述信息', 'Lichu'),
        ),
        array(
            'id' => 'seo_statistical',
            'title' => __('统计代码', 'Lichu'),
            'subtitle' => __('<span style="color:red">输入代码时请注意辨别代码安全性</span>', 'Lichu'),
            'type' => 'code_editor',
            'settings' => array(
                'theme' => 'default',
                'mode' => 'htmlmixed',
            ),
            'sanitize' => false,
            'default' => '<script></script>',
        ),
        array(
            'id' => 'seo_robots_fieldset',
            'type' => 'fieldset',
            'fields' => array(
                array(
                    'type' => 'subheading',
                    'content' => __('robots.txt 配置', 'Lichu'),
                ),
                array(
                    'type' => 'content',
                    'content' => '<ul> <li>' . __('- 需要 ', 'Lichu') . '<a href="' . admin_url('options-reading.php') . '" target="_blank">' . __('设置-阅读-对搜索引擎的可见性', 'Lichu') . '</a>' . __(' 是开启的状态，以下配置才会生效', 'Lichu') . '</li><li>' . __('- 如果网站根目录下已经有 robots.txt 文件，下面的配置不会生效', 'Lichu') . '</li><li>' . __('- 点击 ', 'Lichu') . '<a href="' . home_url() . '/robots.txt" target="_blank">robots.txt</a>' . __(' 查看配置是否生效，如果网站开启了 CDN，可能需要刷新缓存才会生效', 'Lichu') . '</li></ul>',
                ),
                array(
                    'id' => 'seo_robots',
                    'type' => 'textarea',
                ),
            ),
            'default' => array(
                'seo_robots' => getrobots(),
            ),
        ),
    ),
));

CSF::createSection($prefix, array(
    'title' => __('文章配置', 'Lichu'),
    'icon' => 'fas fa-file-alt',
    'fields' => array(
        array(
            'id' => 'g_163mic',
            'type' => 'switcher',
            'title' => __('网易云音乐', 'Lichu'),
            'subtitle' => __('启用/禁用网易云音乐自动播放功能', 'Lichu'),
            'default' => false,
        ),
        array(
            'id' => 'g_post_comments',
            'type' => 'switcher',
            'title' => __('评论数量展示', 'Lichu'),
            'subtitle' => __('启用/禁用首页及文章页面展示阅读数量的功能', 'Lichu'),
            'default' => true,
        ),
        array(
            'id' => 'g_post_views',
            'type' => 'switcher',
            'title' => __('热度数量展示', 'Lichu'),
            'subtitle' => __('启用/禁用首页及文章页面展示热度数量的功能', 'Lichu'),
            'default' => true,
        ),
        array(
            'id' => 'g_post_loves',
            'type' => 'switcher',
            'title' => __('点赞数量展示', 'Lichu'),
            'subtitle' => __('启用/禁用首页及文章页面展示点赞数量的功能', 'Lichu'),
            'default' => true,
        ),
        array(
            'id' => 'g_post_author',
            'type' => 'switcher',
            'title' => __('作者名称展示', 'Lichu'),
            'subtitle' => __('启用/禁用首页展示作者名称的功能', 'Lichu'),
            'default' => true,
        ),
        array(
            'id' => 'g_post_revision',
            'type' => 'switcher',
            'title' => __('附加功能', 'Lichu'),
            'subtitle' => __('启用/禁用文章自动保存、修订版本功能', 'Lichu'),
            'default' => true,
        ),
        array(
            'id' => 'g_image_filter',
            'type' => 'switcher',
            'title' => __('按类型筛选媒体库功能', 'Lichu'),
            'subtitle' => __('启用/禁用按类型筛选媒体库功能功能', 'Lichu'),
            'default' => true,
        ),
        array(
            'id' => 'g_article_lightgallery',
            'type' => 'switcher',
            'title' => __('文章图片灯箱', 'Lichu'),
            'subtitle' => __('启用/禁用文章图片灯箱功能', 'Lichu'),
            'default' => true,
        ),
        array(
            'id' => 'g_article_widgets',
            'type' => 'image_select',
            'title' => __('页面布局', 'Lichu'),
            'subtitle' => __('差异在于侧边栏小工具，仅在文章页面生效', 'Lichu'),
            'options' => array(
                'one_side' => get_template_directory_uri() . '/assets/img/options/col-12.png',
                'two_side' => get_template_directory_uri() . '/assets/img/options/col-8.png',
            ),
            'default' => 'two_side',
        ),
        array(
            'id' => 'g_cc_fieldset',
            'type' => 'fieldset',
            'fields' => array(
                array(
                    'type' => 'subheading',
                    'content' => __('知识共享协议', 'Lichu'),
                ),
                array(
                    'id' => 'g_cc_switch',
                    'type' => 'switcher',
                    'title' => __('功能开关', 'Lichu'),
                    'subtitle' => __('开启/关闭 知识共享协议', 'Lichu'),
                    'text_on' => __('开启', 'Lichu'),
                    'text_off' => __('关闭', 'Lichu'),
                ),
                array(
                    'id' => 'g_cc',
                    'type' => 'select',
                    'title' => __('协议名称', 'Lichu'),
                    'subtitle' => __('选择文章的知识共享协议', 'Lichu'),
                    'options' => array(
                        'one' => __('知识共享署名 4.0 国际许可协议', 'Lichu'),
                        'two' => __('知识共享署名-非商业性使用 4.0 国际许可协议', 'Lichu'),
                        'three' => __('知识共享署名-禁止演绎 4.0 国际许可协议', 'Lichu'),
                        'four' => __('知识共享署名-非商业性使用-禁止演绎 4.0 国际许可协议', 'Lichu'),
                        'five' => __('知识共享署名-相同方式共享 4.0 国际许可协议', 'Lichu'),
                        'six' => __('知识共享署名-非商业性使用-相同方式共享 4.0 国际许可协议', 'Lichu'),
                    ),
                ),
            ),
            'default' => array(
                'g_cc_switch' => false,
                'g_cc' => 'one',
            ),
        ),
        array(
            'id' => 'g_article_fieldset',
            'type' => 'fieldset',
            'fields' => array(
                array(
                    'type' => 'subheading',
                    'content' => __('文章 HOT 标签', 'Lichu'),
                ),
                array(
                    'id' => 'g_article_comment',
                    'type' => 'text',
                    'title' => __('评论数', 'Lichu'),
                    'subtitle' => __('填写显示 HOT 标签需要的评论数', 'Lichu'),
                ),
                array(
                    'id' => 'g_article_love',
                    'type' => 'text',
                    'title' => __('点赞数', 'Lichu'),
                    'subtitle' => __('填写显示 HOT 标签需要的点赞数', 'Lichu'),
                ),
            ),
            'default' => array(
                'g_article_comment' => '20',
                'g_article_love' => '200',
            ),
        ),
        array(
            'id' => 'g_donate_fieldset',
            'type' => 'fieldset',
            'fields' => array(
                array(
                    'type' => 'subheading',
                    'content' => __('文章打赏', 'Lichu'),
                ),
                array(
                    'id' => 'g_donate',
                    'type' => 'switcher',
                    'title' => __('功能开关', 'Lichu'),
                    'subtitle' => __('开启/关闭 文章打赏', 'Lichu'),
                    'text_on' => __('开启', 'Lichu'),
                    'text_off' => __('关闭', 'Lichu'),
                ),
                array(
                    'id' => 'g_donate_wechat',
                    'type' => 'upload',
                    'title' =>  __('微信二维码', 'Lichu'),
                    'library' => 'image',
                    'preview' => true,
                ),
                array(
                    'id' => 'g_donate_alipay',
                    'type' => 'upload',
                    'title' =>  __('支付宝二维码', 'Lichu'),
                    'library' => 'image',
                    'preview' => true,
                ),
            ),
            'default' => array(
                'g_donate' => false,
                'g_donate_wechat' => get_template_directory_uri() . '/assets/img/200.png',
                'g_donate_alipay' => get_template_directory_uri() . '/assets/img/200.png',
            ),
        ),
    ),
));

CSF::createSection($prefix, array(
    'title' =>  __('邮件配置', 'Lichu'),
    'icon' => 'fas fa-envelope',
    'fields' => array(
        array(
            'id' => 'm_smtp',
            'type' => 'switcher',
            'title' => __('SMTP 服务', 'Lichu'),
            'subtitle' => __('启用/禁用 SMTP 服务', 'Lichu'),
            'default' => false,
        ),
        array(
            'id' => 'm_host',
            'type' => 'text',
            'title' => __('邮件服务器', 'Lichu'),
            'subtitle' => __('填写发件服务器地址', 'Lichu'),
            'placeholder' => __('smtp.example.com', 'Lichu'),
        ),
        array(
            'id' => 'm_port',
            'type' => 'text',
            'title' => __('服务器端口', 'Lichu'),
            'subtitle' => __('填写发件服务器端口', 'Lichu'),
            'placeholder' => __('465', 'Lichu'),
        ),
        array(
            'id' => 'm_sec',
            'type' => 'text',
            'title' => __('授权方式', 'Lichu'),
            'subtitle' => __('填写登录鉴权的方式', 'Lichu'),
            'placeholder' => __('ssl', 'Lichu'),
        ),
        array(
            'id' => 'm_username',
            'type' => 'text',
            'title' => __('邮箱帐号', 'Lichu'),
            'subtitle' => __('填写邮箱账号', 'Lichu'),
            'placeholder' => __('user@example.com', 'Lichu'),
        ),
        array(
            'id' => 'm_passwd',
            'type' => 'text',
            'title' => __('邮箱密码', 'Lichu'),
            'subtitle' => __('填写邮箱密码', 'Lichu'),
            'attributes' => array(
                'type' => 'password',
            ),
        ),
    ),
));

CSF::createSection($prefix, array(
    'id' => 'top_fields',
    'title' => __('顶部配置', 'Lichu'),
    'icon' => 'fas fa-window-maximize',
));

CSF::createSection($prefix, array(
    'parent' => 'top_fields',
    'title' => __('图片导航', 'Lichu'),
    'icon' => 'fas fa-arrow-right',
    'fields' => array(
        array(
            'id' => 'top_img_switch',
            'type' => 'switcher',
            'title' => __('图片导航', 'Lichu'),
            'subtitle' => __('启用/禁用 图片导航', 'Lichu'),
            'default' => true,
        ),
        array(
            'id' => 'top_img',
            'type' => 'upload',
            'title' =>  __('顶部图片', 'Lichu'),
            'library' => 'image',
            'preview' => true,
            'default' => get_template_directory_uri() . '/assets/img/background.jpg',
        ),
        array(
            'id' => 'top_title',
            'type' => 'text',
            'title' => __('图片标题', 'Lichu'),
            'default' => __('Lichu', 'Lichu'),
        ),
        array(
            'id' => 'top_describe',
            'type' => 'text',
            'title' => __('标题描述', 'Lichu'),
            'default' => __('专注于用户阅读体验的响应式博客主题', 'Lichu'),
        ),
    ),
));

CSF::createSection($prefix, array(
    'parent' => 'top_fields',
    'title' => __('颜色导航', 'Lichu'),
    'icon' => 'fas fa-arrow-right',
    'fields' => array(
        array(
            'id' => 'top_color',
            'type' => 'color',
            'default' => '#24292e',
            'title' =>  __('颜色导航', 'Lichu'),
        ),
    ),
));

CSF::createSection($prefix, array(
    'id' => 'footer_fields',
    'title' => __('页脚配置', 'Lichu'),
    'icon' => 'far fa-window-maximize',
));

CSF::createSection($prefix, array(
    'parent' => 'footer_fields',
    'title' => __('社交图标', 'Lichu'),
    'icon' => 'fas fa-arrow-right',
    'fields' => array(
        array(
            'id' => 's_social_fieldset',
            'type' => 'fieldset',
            'fields' => array(
                array(
                    'type' => 'subheading',
                    'content' => __('国内平台', 'Lichu'),
                ),
                array(
                    'id' => 's_sina_url',
                    'type' => 'text',
                    'title' => __('新浪微博', 'Lichu'),
                    'placeholder' => __('https://weibo.com/xxxxx', 'Lichu'),
                ),
                array(
                    'id' => 's_bilibili_url',
                    'type' => 'text',
                    'title' => __('哔哩哔哩', 'Lichu'),
                    'placeholder' => __('https://space.bilibili.com/xxxxx', 'Lichu'),
                ),
                array(
                    'id' => 's_coding_url',
                    'type' => 'text',
                    'title' => __('CODING', 'Lichu'),
                    'placeholder' => __('https://xxxxx.coding.net/u/xxxxx', 'Lichu'),
                ),
                array(
                    'id' => 's_gitee_url',
                    'type' => 'text',
                    'title' => __('码云', 'Lichu'),
                    'placeholder' => __('https://gitee.com/xxxxx', 'Lichu'),
                ),
                array(
                    'id' => 's_douban_url',
                    'type' => 'text',
                    'title' => __('豆瓣', 'Lichu'),
                    'placeholder' => __('https://www.douban.com/people/xxxxx', 'Lichu'),
                ),
            ),
        ),
        array(
            'id' => 's_social_fieldset',
            'type' => 'fieldset',
            'fields' => array(
                array(
                    'type' => 'subheading',
                    'content' => __('海外平台', 'Lichu'),
                ),
                array(
                    'id' => 's_twitter_url',
                    'type' => 'text',
                    'title' => __('Twitter', 'Lichu'),
                    'placeholder' => __('https://twitter.com/xxxxx', 'Lichu'),
                ),
                array(
                    'id' => 's_telegram_url',
                    'type' => 'text',
                    'title' => __('Telegram', 'Lichu'),
                    'placeholder' => __('https://t.me/xxxxx', 'Lichu'),
                ),
                array(
                    'id' => 's_linkedin_url',
                    'type' => 'text',
                    'title' => __('LinkedIn', 'Lichu'),
                    'placeholder' => __('https://www.linkedin.com/in/xxxxx', 'Lichu'),
                ),
                array(
                    'id' => 's_youtube_url',
                    'type' => 'text',
                    'title' => __('YouTube', 'Lichu'),
                    'placeholder' => __('https://www.youtube.com/channel/xxxxx', 'Lichu'),
                ),
                array(
                    'id' => 's_github_url',
                    'type' => 'text',
                    'title' => __('Github', 'Lichu'),
                    'placeholder' => __('https://github.com/xxxxx', 'Lichu'),
                ),
                array(
                    'id' => 's_stackflow_url',
                    'type' => 'text',
                    'title' => __('Stack Overflow', 'Lichu'),
                    'placeholder' => __('https://stackoverflow.com/users/xxxxx', 'Lichu'),
                ),
            ),
        ),
        array(
            'id' => 's_social_fieldset',
            'type' => 'fieldset',
            'fields' => array(
                array(
                    'type' => 'subheading',
                    'content' => __('其他', 'Lichu'),
                ),
                array(
                    'id' => 's_email_url',
                    'type' => 'text',
                    'title' => __('电子邮箱', 'Lichu'),
                    'placeholder' => __('mailto:xxxxx@example.com', 'Lichu'),
                ),
            ),
            'default' => array(
                "s_sina_url" => "",
                "s_bilibili_url" => "",
                "s_coding_url" => "",
                "s_gitee_url" => "",
                "s_douban_url" => "",
                "s_twitter_url" => "",
                "s_telegram_url" => "",
                "s_linkedin_url" => "",
                "s_youtube_url" => "",
                "s_github_url" => "",
                "s_stackflow_url" => "",
                "s_email_url" => ""
            ),
        ),
    ),
));

CSF::createSection($prefix, array(
    'parent' => 'footer_fields',
    'title' => __('备案信息', 'Lichu'),
    'icon' => 'fas fa-arrow-right',
    'fields' => array(
        array(
            'id' => 's_icp',
            'type' => 'text',
            'title' => __('工信部备案信息', 'Lichu'),
            'subtitle' => __('由<a target="_blank" href="https://beian.miit.gov.cn/">工业和信息化部政务服务平台</a>提供', 'Lichu'),
            'placeholder' => __('冀ICP证XXXXXX号', 'Lichu'),
        ),
        array(
            'id' => 's_gov',
            'type' => 'text',
            'title' => __('公安备案信息', 'Lichu'),
            'subtitle' => __('由<a target="_blank" href="http://www.beian.gov.cn/">全国互联网安全管理服务平台</a>提供', 'Lichu'),
            'placeholder' => __('冀公网安备 XXXXXXXXXXXXX 号', 'Lichu'),
        ),
        array(
            'id' => 's_gov_link',
            'type' => 'text',
            'title' => __('公安备案链接', 'Lichu'),
            'subtitle' => __('由<a target="_blank" href="http://www.beian.gov.cn/">全国互联网安全管理服务平台</a>提供', 'Lichu'),
            'placeholder' => __('http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=xxxxx', 'Lichu'),
        ),
    ),
));

CSF::createSection($prefix, array(
    'parent' => 'footer_fields',
    'title' => __('版权信息', 'Lichu'),
    'icon' => 'fas fa-arrow-right',
    'fields' => array(
        array(
            'id' => 's_copyright',
            'type' => 'textarea',
            'title' => __('版权信息', 'Lichu'),
            'default' => 'COPYRIGHT © ' . wp_date('Y') . ' ' . get_bloginfo('name') . '. ALL RIGHTS RESERVED.',
        ),
    ),
));

CSF::createSection($prefix, array(
    'id' => 'ad_fields',
    'title' => __('广告配置', 'Lichu'),
    'icon' => 'fas fa-ad',
));

CSF::createSection($prefix, array(
    'parent' => 'ad_fields',
    'title' => __('文章广告', 'Lichu'),
    'icon' => 'fas fa-arrow-right',
    'fields' => array(
        array(
            'id' => 'single_ad_top_group',
            'type' => 'group',
            'title' => '文章顶部广告',
            'subtitle' => '点击添加广告，最多添加 3 个顶部广告',
            'min' => 1,
            'max' => 3,
            'fields' => array(
                array(
                    'id' => 'ad_id',
                    'type' => 'text',
                    'title' =>  __('唯一标识', 'Lichu'),
                    'subtitle' =>  __('仅用于识别广告内容，可以作为备注使用', 'Lichu'),
                ),
                array(
                    'id' => 'ad_img',
                    'type' => 'upload',
                    'title' => __('轮播图片', 'Lichu'),
                    'subtitle' =>  __('可以直接填写图片链接，也可以上传图片', 'Lichu'),
                    'library' => 'image',
                    'preview' => true,
                ),
                array(
                    'id' => 'ad_url',
                    'type' => 'text',
                    'title' =>  __('网址链接', 'Lichu'),
                    'subtitle' =>  __('需要填写完整的链接地址，包含协议头', 'Lichu'),
                ),
                array(
                    'id' => 'ad_switcher',
                    'type' => 'switcher',
                    'title' => __('功能开关', 'Lichu'),
                    'subtitle' => __('开启/关闭此条广告', 'Lichu'),
                    'text_on' => __('开启', 'Lichu'),
                    'text_off' => __('关闭', 'Lichu'),
                    'default' => true
                ),
            ),
        ),
        array(
            'id' => 'single_ad_bottom_group',
            'type' => 'group',
            'title' => '文章底部广告',
            'subtitle' => '点击添加广告，最多添加 3 个底部广告',
            'min' => 1,
            'max' => 3,
            'fields' => array(
                array(
                    'id' => 'ad_id',
                    'type' => 'text',
                    'title' =>  __('唯一标识', 'Lichu'),
                    'subtitle' =>  __('仅用于识别广告内容，可以作为备注使用', 'Lichu'),
                ),
                array(
                    'id' => 'ad_img',
                    'type' => 'upload',
                    'title' => __('轮播图片', 'Lichu'),
                    'subtitle' =>  __('可以直接填写图片链接，也可以上传图片', 'Lichu'),
                    'library' => 'image',
                    'preview' => true,
                ),
                array(
                    'id' => 'ad_url',
                    'type' => 'text',
                    'title' =>  __('网址链接', 'Lichu'),
                    'subtitle' =>  __('需要填写完整的链接地址，包含协议头', 'Lichu'),
                ),
                array(
                    'id' => 'ad_switcher',
                    'type' => 'switcher',
                    'title' => __('功能开关', 'Lichu'),
                    'subtitle' => __('开启/关闭此条广告', 'Lichu'),
                    'text_on' => __('开启', 'Lichu'),
                    'text_off' => __('关闭', 'Lichu'),
                    'default' => true
                ),
            ),
        ),
    ),
));

CSF::createSection($prefix, array(
    'title' => __('备份恢复', 'Lichu'),
    'icon' => 'fas fa-undo',
    'fields' => array(
        array(
            'type' => 'backup',
        ),
    ),
));

CSF::createSection($prefix, array(
    'title' => __('关于主题', 'Lichu'),
    'icon' => 'fas fa-question-circle',
    'fields' => array(
        array(
            'type' => 'subheading',
            'content' => __('基础信息', 'Lichu'),
        ),
        array(
            'type' => 'content',
            'content' => '<ul style="margin: 0 auto;"> <li>' . __('PHP 版本：', 'Lichu') . PHP_VERSION . '</li> <li>' . __('Lichu 版本：', 'Lichu') . THEME_VERSION . '</li> <li>' . __('WordPress 版本：', 'Lichu') . $wp_version . '</li> <li>' . __('User Agent 信息：', 'Lichu') . $_SERVER['HTTP_USER_AGENT'] . '</li> </ul>',
        ),

        array(
            'type' => 'subheading',
            'content' => __('资料文档', 'Lichu'),
        ),
        array(
            'type' => 'content',
            'content' => '<ul style="margin: 0 auto;"><li>' . __('问题反馈：', 'Lichu') . '<a href="https://github.com/hekailiu-2512/Lichu/issues" target="_blank">https://github.com/hekailiu-2512/Lichu/issues</a></li> <li>' . __('使用说明：', 'Lichu') . '<a href="https://github.com/hekailiu-2512/Lichu/wiki" target="_blank">https://github.com/hekailiu-2512/Lichu/wiki</a></li> <li>' . __('更新日志：', 'Lichu') . '<a href="https://github.com/hekailiu-2512/Lichu/releases" target="_blank">https://github.com/hekailiu-2512/Lichu/releases</a></li> </ul>',
        ),
        array(
            'type' => 'subheading',
            'content' => __('版权声明', 'Lichu'),
        ),
        array(
            'type' => 'content',
            'content' => __('主题源码使用 <a href="https://github.com/hekailiu-2512/Lichu/blob/main/LICENSE" target="_blank">GPL-3.0 协议</a> 进行许可，说明文档使用 <a href="https://creativecommons.org/licenses/by-nc-nd/4.0/" target="_blank">CC BY-NC-ND 4.0</a> 进行许可。', 'Lichu'),
        ),
        array(
            'type' => 'subheading',
            'content' => __('讨论交流', 'Lichu'),
        ),
        array(
            'type' => 'content',
            'content' => '<div style="max-width:800px;"><img style="width: 70%;height: auto;" src="' . get_template_directory_uri() . '/assets/img/options/discuss.png"></div>',
        ),
        array(
            'type' => 'subheading',
            'content' => __('打赏支持', 'Lichu'),
        ),
        array(
            'type' => 'content',
            'content' => '如果您有用到我开发维护的项目，请考虑支持一下我的工作，让我可以持续的维护它们，您可在爱发电（<a href="https://afdian.net/a/hekailiu-2512" target="_blank">https://afdian.net/a/hekailiu-2512</a>）中进行打赏，谢谢！',
        ),
    ),
));
