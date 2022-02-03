<?php

namespace Omnipay\WechatPay;

use Omnipay\Common\AbstractGateway;
use Omnipay\WechatPay\Message\CreateOrderRequest;
use Omnipay\WechatPay\Message\CompletePurchaseRequest;
use Omnipay\WechatPay\Message\GetSignKeyRequest;
use Omnipay\WechatPay\Message\QueryOrderRequest;
use Omnipay\WechatPay\Message\QueryRefundRequest;
use Omnipay\WechatPay\Message\CloseOrderRequest;
use Omnipay\WechatPay\Message\RefundOrderRequest;
use Omnipay\WechatPay\Message\CompleteRefundRequest;
use Omnipay\WechatPay\Message\PromotionTransferRequest;
use Omnipay\WechatPay\Message\QueryTransferRequest;
use Omnipay\WechatPay\Message\DownloadBillRequest;
use Omnipay\WechatPay\Message\ReverseOrderRequest;

abstract class BaseAbstractGateway extends AbstractGateway
{
    public function setTradeType($tradeType)
    {
        $this->setParameter('trade_type', $tradeType);
    }


    public function setAppId($appId)
    {
        $this->setParameter('app_id', $appId);
    }


    public function getAppId()
    {
        return $this->getParameter('app_id');
    }


    public function setApiKey($apiKey)
    {
        $this->setParameter('api_key', $apiKey);
    }


    public function getApiKey()
    {
        return $this->getParameter('api_key');
    }


    public function setMchId($mchId)
    {
        $this->setParameter('mch_id', $mchId);
    }


    public function getMchId()
    {
        return $this->getParameter('mch_id');
    }

    /**
     * 子商户id
     *
     * @return mixed $subMchId
     */
    public function getSubMchId()
    {
        return $this->getParameter('sub_mch_id');
    }

    /**
     * 子商户id
     * @param mixed $subMchId
     */
    public function setSubMchId($subMchId)
    {
        $this->setParameter('sub_mch_id', $subMchId);
    }

    /**
     * 子商户 app_id
     *
     * @return mixed
     */
    public function getSubAppId()
    {
        return $this->getParameter('sub_appid');
    }

    /**
     * @param mixed $subAppId
     */
    public function setSubAppId($subAppId)
    {
        $this->setParameter('sub_appid', $subAppId);
    }

    public function setEnv($env)
    {
        $this->setParameter('env', $env);
    }

    public function getSandBoxSignKey()
    {
        $response = $this->getsignkey($this->parameters->all())->send();
        return $response->getKey();
    }

    public function getEnv()
    {
        return $this->getParameter('env');
    }


    public function setNotifyUrl($url)
    {
        $this->setParameter('notify_url', $url);
    }


    public function getNotifyUrl()
    {
        return $this->getParameter('notify_url');
    }


    /**
     * @return mixed
     */
    public function getCertPath()
    {
        return $this->getParameter('cert_path');
    }


    /**
     * @param mixed $certPath
     */
    public function setCertPath($certPath)
    {
        $this->setParameter('cert_path', $certPath);
    }


    /**
     * @return mixed
     */
    public function getKeyPath()
    {
        return $this->getParameter('key_path');
    }


    /**
     * @param mixed $keyPath
     */
    public function setKeyPath($keyPath)
    {
        $this->setParameter('key_path', $keyPath);
    }


    /**
     * @param array $parameters
     *
     * @return \Omnipay\WechatPay\Message\CreateOrderRequest
     */
    public function purchase($parameters = array())
    {
        $parameters['trade_type'] = $this->getTradeType();

        return $this->createRequest(CreateOrderRequest::class, $parameters);
    }

    public function getsignkey($parameters = array())
    {
        $parameters['env'] = 'sandbox';
        return $this->createRequest(GetSignKeyRequest::class, $parameters);
    }


    public function getTradeType()
    {
        return $this->getParameter('trade_type');
    }


    /**
     * @param array $parameters
     *
     * @return \Omnipay\WechatPay\Message\CompletePurchaseRequest
     */
    public function completePurchase($parameters = array())
    {
        return $this->createRequest(CompletePurchaseRequest::class, $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return \Omnipay\WechatPay\Message\CompleteRefundRequest
     */
    public function completeRefund($parameters = array())
    {
        return $this->createRequest(CompleteRefundRequest::class, $parameters);
    }


    /**
     * @param array $parameters
     *
     * @return \Omnipay\WechatPay\Message\QueryOrderRequest
     */
    public function query($parameters = array())
    {
        return $this->createRequest(QueryOrderRequest::class, $parameters);
    }


    /**
     * @param array $parameters
     *
     * @return \Omnipay\WechatPay\Message\CloseOrderRequest
     */
    public function close($parameters = array())
    {
        return $this->createRequest(CloseOrderRequest::class, $parameters);
    }


    public function cancel($parameters = array())
    {

        return $this->createRequest(ReverseOrderRequest::class, $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return \Omnipay\WechatPay\Message\RefundOrderRequest
     */
    public function refund($parameters = array())
    {
        return $this->createRequest(RefundOrderRequest::class, $parameters);
    }


    /**
     * @param array $parameters
     *
     * @return \Omnipay\WechatPay\Message\QueryRefundRequest
     */
    public function queryRefund($parameters = array())
    {
        return $this->createRequest(QueryRefundRequest::class, $parameters);
    }


    /**
     * @param array $parameters
     *
     * @return \Omnipay\WechatPay\Message\PromotionTransferRequest
     */
    public function transfer($parameters = array())
    {
        return $this->createRequest(PromotionTransferRequest::class, $parameters);
    }


    /**
     * @param array $parameters
     *
     * @return \Omnipay\WechatPay\Message\QueryTransferRequest
     */
    public function queryTransfer($parameters = array())
    {
        return $this->createRequest(QueryTransferRequest::class, $parameters);
    }


    /**
     * @param array $parameters
     *
     * @return \Omnipay\WechatPay\Message\DownloadBillRequest
     */
    public function downloadBill($parameters = array())
    {
        return $this->createRequest(DownloadBillRequest::class, $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return \Omnipay\WechatPay\Message\PayBankRequest
     */
    public function payBank($parameters = array())
    {
        return $this->createRequest('\Omnipay\WechatPay\Message\PayBankRequest', $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return \Omnipay\WechatPay\Message\GetPublicKeyRequest
     */
    public function getPublicKey($parameters = array())
    {
        return $this->createRequest('\Omnipay\WechatPay\Message\GetPublicKeyRequest', $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return \Omnipay\WechatPay\Message\QueryBankRequest
     */
    public function queryBank($parameters = array())
    {
        return $this->createRequest('\Omnipay\WechatPay\Message\QueryBankRequest', $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return \Omnipay\WechatPay\Message\CouponTransfersResponse
     */
    public function sendCoupon($parameters = array())
    {
        return $this->createRequest('\Omnipay\WechatPay\Message\CouponTransfersRequest', $parameters);
    }
}
