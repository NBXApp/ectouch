<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// API
Route::get('/', function () {
    return 'I\'m ready.';
});

// Notify
Route::group(['prefix' => 'v2'], function () {
    Route::post('ectouch.order.notify.{code}', 'OrderController@notify');
    Route::get('ectouch.user.auth.callback/{vendor:[0-9]+}', 'UserController@callback');
});

// Guest
Route::group(['prefix' => 'v2', 'middleware' => 'api'], function () {
    // 商品
    Route::post('ectouch.item.get', 'GoodsController@show'); // 获取单个商品信息
    Route::post('ectouch.item.sku.get', 'ProductController@show'); // 获取单个商品SKU
    Route::post('ectouch.item.accessory.list', 'GoodsController@accessory'); // 获取商品配件
    Route::post('ectouch.items.get', 'GoodsController@index'); // 获取商品列表
    // 类目
    Route::get('ectouch.category.get', 'CategoryController@show'); // 获取单个分类信息
    Route::get('ectouch.categories.get', 'CategoryController@index'); // 获取分类列表
    Route::get('ectouch.brand.category.get', 'BrandController@category'); // 获取品牌分类
    Route::get('ectouch.brand.get', 'BrandController@show'); // 获取单个品牌信息
    Route::get('ectouch.brands.get', 'BrandController@index'); // 获取品牌列表
    // 用户
    Route::get('ectouch.user.signup.fields', 'UserController@fields'); // 获取注册字段
    Route::post('ectouch.user.social', 'UserController@social'); // 获取oAuth
    Route::post('ectouch.user.oauth', 'UserController@oauth'); // oAuth登录
    Route::post('ectouch.user.signin', 'UserController@signin'); // 用户登录
    Route::post('ectouch.user.default.signup', 'UserController@signupByEmail'); // 用户邮箱注册
    Route::post('ectouch.user.mobile.signup', 'UserController@signupByMobile'); // 用户手机注册
    Route::post('ectouch.user.mobile.send', 'UserController@sendCode'); // 发送验证码
    Route::post('ectouch.user.mobile.verify', 'UserController@verifyMobile'); // 校验验证码
    Route::post('ectouch.user.default.reset', 'UserController@resetByEmail'); // 找回密码
    Route::post('ectouch.user.mobile.reset', 'UserController@resetByMobile');
    Route::post('ectouch.user.bind', 'UserController@bind'); // 绑定注册
    // 评论
    Route::get('ectouch.comments.get', 'CommentController@index'); // 显示评论列表
    Route::get('ectouch.messages.get', 'MessageController@index'); // 显示留言列表
    // 营销
    Route::get('ectouch.activity.list', 'ActivityController@index'); // 优惠活动
    Route::get('ectouch.auction.list', 'AuctionController@index'); // 拍卖活动
    Route::get('ectouch.groupbuy.list', 'GroupBuyController@index'); // 团购活动
    Route::get('ectouch.exchange.list', 'ExchangeController@index'); // 积分兑换
    Route::get('ectouch.topic.list', 'TopicController@index'); // 专题汇
    Route::get('ectouch.bargain.list', 'BargainController@index'); // 砍价活动
    Route::get('ectouch.article.list', 'ArticleController@index'); // 社区资讯
    Route::get('ectouch.article.get', 'ArticleController@show');
    Route::get('ectouch.distribution.list', 'DistributionController@index'); // 分销活动
    Route::get('ectouch.crowdfunding.list', 'CrowdFundingController@index'); // 微众筹
    Route::get('ectouch.spellgroup.list', 'SpellGroupController@index'); // 拼团
    Route::get('ectouch.package.list', 'PackageController@index'); // 超值礼包
    Route::get('ectouch.wholesale.list', 'WholesaleController@index'); // 批发活动
    Route::get('ectouch.snatch.list', 'SnatchController@index'); // 夺宝奇兵
    Route::get('ectouch.checkin.list', 'CheckInController@index'); // 每日签到
    Route::get('ectouch.sharkitoff.list', 'SharkItOffController@index'); // 摇一摇
    Route::get('ectouch.payingagent.list', 'PayingAgentController@index'); // 订单代付
    Route::get('ectouch.eggfrenzy.list', 'EggFrenzyController@index'); // 砸金蛋
    Route::get('ectouch.scratchcard.list', 'ScratchCardController@index'); // 刮刮卡
    Route::get('ectouch.bigwheel.list', 'BigWheelController@index'); // 大转盘
    Route::get('ectouch.coupon.list', 'CouponController@index'); // 领取优惠券
    // 微信
    Route::post('ectouch.wechat.jssdk', 'WechatController@jssdk'); // 微信JSSDK
    // 门店
    Route::get('ectouch.stores.get', 'StoreController@index'); // 门店列表
    Route::get('ectouch.store.get', 'StoreController@show'); // 门店详情
    // 核销
    Route::get('ectouch.virtualcodes.get', 'VirtualcodeController@index'); // 核销订单列表
    Route::get('ectouch.virtualcode.get', 'VirtualcodeController@show'); // 核销订单信息
    Route::post('ectouch.virtualcode.apply', 'VirtualcodeController@apply'); // 使用核销验证码
    // 店铺
    Route::get('ectouch.shop.config', 'ShopController@config'); // 系统配置
    Route::get('ectouch.shop.shipping', 'ShopController@shipping'); // 配送方式
    Route::get('ectouch.shop.payment', 'ShopController@payment'); // 支付方式
    Route::get('ectouch.shop.banner', 'ShopController@banner'); // 手机幻灯片
    Route::get('ectouch.shop.adv', 'ShopController@adv'); // 手机广告
    Route::get('ectouch.shop.help', 'ShopController@help'); // 商店帮助
    // 工具
    Route::get('ectouch.tool.region', 'MiscController@region'); // 地区
    Route::get('ectouch.tool.chat', 'MiscController@chat'); // 在线客服
    Route::post('ectouch.tool.sms', 'MiscController@sms'); // 短信发送
    Route::get('ectouch.search.keywords', 'GoodsController@index'); // 搜索关键词
});

// Authentication
Route::group(['prefix' => 'v2', 'middleware' => 'auth:api'], function () {
    // 用户资料
    Route::get('ectouch.user.get', 'UserController@show'); // 获取用户信息
    Route::post('ectouch.user.profile.update', 'UserController@update'); // 更新用户资料
    Route::post('ectouch.user.password.update', 'UserController@password'); // 修改会员密码
    // 收货地址
    Route::get('ectouch.user.address.get', 'UserAddressController@show'); // 获取用户收货地址
    Route::post('ectouch.user.address.add', 'UserAddressController@store'); // 添加用户收货地址
    Route::post('ectouch.user.address.update', 'UserAddressController@update'); // 更新用户收货地址
    Route::post('ectouch.user.address.delete', 'UserAddressController@destroy'); // 删除用户收货地址
    Route::post('ectouch.user.address.default', 'UserAddressController@default'); // 设置默认收货地址
    // 收藏&关注
    Route::post('ectouch.user.collect.add', 'UserCollectController@store'); // 用户收藏单个商品
    Route::post('ectouch.user.collect.delete', 'UserCollectController@destroy'); // 用户删除收藏商品
    Route::get('ectouch.user.collects.get', 'UserCollectController@index'); // 用户收藏列表
    Route::post('ectouch.user.attention.add', 'UserAttentionController@store'); // 添加关注商品
    Route::post('ectouch.user.attention.delete', 'UserAttentionController@destroy'); // 取消关注商品
    Route::get('ectouch.user.attentions.get', 'UserAttentionController@index'); // 用户关注列表
    // 资金
    Route::get('ectouch.user.account.log', 'UserAccountController@log'); // 获取会员充值提现记录
    Route::post('ectouch.user.account.deposit', 'UserAccountController@deposit'); // 创建会员充值申请
    Route::post('ectouch.user.account.raply', 'UserAccountController@raply'); // 创建会员提现申请
    Route::get('ectouch.user.account.detail', 'UserAccountController@detail'); // 获取帐户资金明细
    Route::post('ectouch.user.account.pay', 'UserAccountController@pay'); // 会员充值付款
    Route::post('ectouch.user.account.cancel', 'UserAccountController@cancel'); // 会员充值/提现申请取消
    // 红包
    Route::get('ectouch.user.bonus.get', 'UserBonusController@index'); // 会员红包列表
    Route::post('ectouch.user.bonus.add', 'UserBonusController@store'); // 添加一个红包
    // 缺货登记
    Route::post('ectouch.user.booking.add', 'UserBookingController@store'); // 添加缺货登记
    Route::post('ectouch.user.booking.delete', 'UserBookingController@destroy'); // 删除缺货登记
    Route::get('ectouch.user.bookings.get', 'UserBookingController@index'); // 显示缺货登记列表
    // 标签云
    Route::get('ectouch.user.tags.get', 'UserTagController@index'); // 标签云列表
    Route::post('ectouch.user.tag.add', 'UserTagController@store'); // 添加标签云
    Route::post('ectouch.user.tag.delete', 'UserTagController@destroy'); // 删除标签
    // 推荐分成
    Route::get('ectouch.user.affiliate', 'UserController@affiliate'); // 用户推荐分成
    // 浏览历史
    Route::post('ectouch.user.history.add', 'UserHistoryController@store'); // 增加商品浏览历史
    Route::post('ectouch.user.history.clear', 'UserHistoryController@clear'); // 清除商品浏览历史
    // 评论&留言
    Route::post('ectouch.comment.add', 'CommentController@store'); // 发表商品评论
    Route::post('ectouch.comment.delete', 'CommentController@destroy'); // 删除评论
    Route::post('ectouch.message.add', 'MessageController@store'); // 提交留言反馈
    Route::post('ectouch.message.delete', 'MessageController@destroy'); // 删除留言
    // 购物车
    Route::get('ectouch.cart.get', 'CartController@index'); // 获取购物车商品
    Route::post('ectouch.cart.add', 'CartController@store'); // 添加一个商品到购物车
    Route::post('ectouch.cart.update', 'CartController@update'); // 更新购物车商品数目
    Route::post('ectouch.cart.delete', 'CartController@destroy'); // 从购物车中删除一商品
    Route::post('ectouch.cart.clear', 'CartController@clear'); // 清空购物车中的商品
    Route::post('ectouch.cart.collect', 'CartController@collect'); // 将商品移至收藏夹
    Route::post('ectouch.cart.package.add', 'CartPackageController@store'); // 添加礼包到购物车
    Route::post('ectouch.cart.favourable.add', 'CartFavourableController@store'); // 添加优惠活动到购物车
    // 交易
    Route::post('ectouch.flow.check', 'FlowController@check'); // 检查订单数据
    Route::post('ectouch.flow.shipping.update', 'FlowController@shipping'); // 改变配送方式
    Route::post('ectouch.flow.insure.update', 'FlowController@insure'); // 选定/取消配送保价
    Route::post('ectouch.flow.payment.update', 'FlowController@payment'); // 改变支付方式
    Route::post('ectouch.flow.pack.update', 'FlowController@pack'); // 改变包装
    Route::post('ectouch.flow.card.update', 'FlowController@card'); // 改变贺卡
    Route::post('ectouch.flow.surplus.update', 'FlowController@surplus'); // 改变余额
    Route::post('ectouch.flow.integral.update', 'FlowController@integral'); // 改变积分
    Route::post('ectouch.flow.bonus.update', 'FlowController@bonus'); // 改变红包优惠券
    Route::post('ectouch.flow.needinv.update', 'FlowController@needinv'); // 改变发票设置
    Route::post('ectouch.flow.oos.update', 'FlowController@oos'); // 改变缺货处理方式
    // 订单
    Route::post('ectouch.order.add', 'OrderController@store'); // 提交订单数据
    Route::get('ectouch.order.get', 'OrderController@show'); // 获取单个订单
    Route::post('ectouch.order.update', 'OrderController@update'); // 更新单个订单
    Route::post('ectouch.order.cancel', 'OrderController@cancel'); // 取消单个订单
    Route::post('ectouch.order.merge', 'OrderController@merge'); // 合并两个订单
    Route::post('ectouch.order.again', 'OrderController@again'); // 订单商品添加到购物车
    Route::get('ectouch.order.pay', 'OrderController@pay'); // 获取订单支付信息
    Route::post('ectouch.order.reminder', 'OrderController@reminder'); // 订单发货提醒
    Route::post('ectouch.order.express', 'OrderController@express'); // 订单快递追踪
    Route::post('ectouch.order.received', 'OrderController@received'); // 订单确认收货
    Route::get('ectouch.orders.get', 'OrderController@index'); // 获取订单列表
});

// Authorization
Route::group(['prefix' => 'v2'], function () {
    Route::post('ectouch.item.add', 'GoodsController@store'); // 新增一个商品
    Route::post('ectouch.item.update', 'GoodsController@update'); // 更新单个商品信息
    Route::post('ectouch.item.delete', 'GoodsController@destroy'); // 删除一个商品
    Route::post('ectouch.item.sku.add', 'ProductController@store'); // 新增商品SKU
    Route::post('ectouch.item.sku.update', 'ProductController@update'); // 更新单个商品SKU
    Route::post('ectouch.item.sku.delete', 'ProductController@destroy'); // 删除单个商品SKU
});
