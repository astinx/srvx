<?php
/**
 * 万汇宝
 */

namespace payment;

class Wanvbo implements Payment
{

    //请求参数
    public $mer_no;               //商家号 商户签约时，万汇宝分配给商家的唯一身份标识 例如：201708160
    public $mer_order_no;         //商户订单号
    public $trade_amount;         //交易金额 单位:元
    public $service_type;         //业务类型 固定选项值：weixin_scan(微信)，qq_scan(QQ)，alipay_scan(支付宝),jd_scan（京东）
    public $order_date;           //订单提交支付时间 格式为：yyyy-MM-dd HH:mm:ss
    public $page_url;             //页面跳转同步通知地址 支付成功后，通过页面跳转的方式跳转到商家网站
    public $back_url;             //异步通知地址 支付成功后，通过异步通知到商家网站
    public $sign_type = 'MD5';    //签名类型 不参与签名 固定值：MD5
    public $sign;                 //签名数据 不参与签名
    public $key;                  //秘钥
    //
    public $mer_remit_no;         //商户订单号
    public $apply_date;           //申请时间
    public $bank_code;            //银行code
    public $province;             //省份
    public $city;                 //城市
    public $card_and_name;        //卡号姓名 '6230580000135712345' . '|' . '小明'
    public $amount;               //金额，单位：元
    //
    public $channel_code;         //银行代码

    //响应参数

    public function __construct($data)
    {
        !empty($data['mer_no'])        && $this->mer_no        = $data['mer_no'];
        !empty($data['mer_order_no'])  && $this->mer_order_no  = $data['mer_order_no'];
        !empty($data['trade_amount'])  && $this->trade_amount  = $data['trade_amount'];
        !empty($data['service_type'])  && $this->service_type  = $data['service_type'];
        !empty($data['order_date'])    && $this->order_date    = $data['order_date'];
        !empty($data['page_url'])      && $this->page_url      = $data['page_url'];
        !empty($data['back_url'])      && $this->back_url      = $data['back_url'];
        !empty($data['key'])           && $this->key           = $data['key'];

        !empty($data['mer_remit_no'])  && $this->mer_remit_no  = $data['mer_remit_no'];
        !empty($data['apply_date'])    && $this->apply_date    = $data['apply_date'];
        !empty($data['bank_code'])     && $this->bank_code     = $data['bank_code'];
        !empty($data['province'])      && $this->province      = $data['province'];
        !empty($data['city'])          && $this->city          = $data['city'];
        !empty($data['card_and_name']) && $this->card_and_name = $data['card_and_name'];
        !empty($data['amount'])        && $this->amount        = $data['amount'];

    }

    //返回对应的配置信息, 例如支持哪些支付功能, 银行配置等
    public function Cfg()
    {

    }

    //银联网关支付
    public function GatewayPay()
    {

    }

    public function GatewayQuery()
    {
    }


    //快捷支付
    public function QuickPay()
    {
        $params = [
            'mer_no'       => $this->mer_no,
            'mer_order_no' => $this->mer_order_no,//商户订单号
            'channel_code' => $this->channel_code,//银行代码
            'trade_amount' => $this->trade_amount,//交易金额,单位（元）
            'service_type' => $this->service_type,//业务类型：weixin_scan(微信)，qq_scan(QQ)，alipay_scan(支付宝)
            'order_date'   => date('Y-m-d H:i:s'),//订单提交支付时间
            'page_url'     => $this->page_url,//页面跳转同步通知地址
            'back_url'     => $this->back_url,//异步通知地址
        ];
        $params = $this->encryption($params);
        $url    = 'http://pay.wanvbo.com/payment/web/receive';
    }

    public function QuickPayQuery()
    {
        $params = [
            'mer_no'       => $this->mer_no,
            'mer_order_no' => $this->mer_order_no,//商户订单号
        ];
        $params = $this->encryption($params);
        $url = 'http://pay.wanvbo.com/query/order/doquery';
    }

    //扫码支付
    public function AlipayQR()
    {
        $params = [
            'mer_no'       => $this->mer_no,
            'mer_order_no' => $this->mer_order_no,//商户订单号
            'trade_amount' => $this->trade_amount,//交易金额,单位（元）
            'service_type' => $this->service_type,//业务类型：weixin_scan(微信)，qq_scan(QQ)，alipay_scan(支付宝)
            'order_date'   => date('Y-m-d H:i:s'),//订单提交支付时间
            'page_url'     => $this->page_url,//页面跳转同步通知地址
            'back_url'     => $this->back_url,//异步通知地址
        ];
        $params = $this->encryption($params);
        $url    = 'http://pay.wanvbo.com/payment/api/scanpay';
    }

    public function AlipayQRQuery()
    {
        $params = [
            'mer_no'       => $this->mer_no,
            'mer_order_no' => $this->mer_order_no,//商户订单号
        ];
        $params = $this->encryption($params);
        $url = 'http://pay..wanvbo.com/query/order/doquery';
    }

    //扫码支付
    public function WechatQR()
    {
    }

    public function WechatQRQuery()
    {
    }

    //扫码支付
    public function QQQR()
    {
    }

    public function QQQRQuery()
    {
    }

    //代付
    public function Remit()
    {
        $para = [
            'mer_no'        => $this->mer_no,
            'mer_remit_no'  => $this->mer_remit_no,//商户订单号
            'apply_date'    => $this->apply_date,//交易金额,单位（元）
            'bank_code'     => $this->bank_code,//业务类型：weixin_scan(微信)，qq_scan(QQ)，alipay_scan(支付宝)
            'province'      => $this->province,//订单提交支付时间
            'city'          => $this->city,//页面跳转同步通知地址
            'card_and_name' => $this->card_and_name,//异步通知地址
            'amount'        => sprintf("%.2f", $this->amount),//异步通知地址
        ];
        $aes_str = $para['card_and_name'];
        $key     = $this->key;//秘钥

        //AES 加密 start
        $blocksize  = mcrypt_get_block_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_ECB);
        $pad        = $blocksize - (strlen($aes_str) % $blocksize);
        $aes_str    = $aes_str . str_repeat(chr($pad), $pad);
        $td         = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_ECB, '');
        mcrypt_generic_init($td, $key, @mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND));
        $cyper_text = mcrypt_generic($td, $aes_str);
        $rt         = bin2hex($cyper_text);
        mcrypt_generic_deinit($td);
        mcrypt_module_close($td);
        //AES 加密 end
        $para['card_and_name'] = $rt;
        $para   = $this->encryption($para);
        $df_url = 'http://remit.wanvbo.com/remit/doRemit';
    }

    //批量代付
    public function RemitBatch()
    {
    }

    public function RemitQuery()
    {
        $params = [
            'mer_no'       => $this->mer_no,       //商家号
            'apply_date'   => $this->apply_date,   //原代付订单申请时间
            'mer_remit_no' => $this->mer_remit_no, //商家代付订单号
        ];
        $params = $this->encryption($params);
        $url = 'http://remit.wanvbo.com/remit/query';
    }

    private function encryption($params)
    {
        ksort($params);
        reset($params);
        $prestr = '';
        foreach ($params as $key => $val) {
            $prestr .= $key . "=" . $val . "&";
        }

        $prestr .= 'key=' . $this->key;//秘钥

        $params['sign_type'] = $this->sign_type;
        $params['sign'] = strtoupper(md5($prestr));

        return $params;
    }
}