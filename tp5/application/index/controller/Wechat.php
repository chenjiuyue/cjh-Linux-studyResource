<?php

define("TOKEN", "tp66");

class wechatCallbackapiTest
{
//检验签名

    //valid 接入时进行的一个操作
    public function valid()
    {
        //判断微信现在是否做接入操作,根据$_GET["echostr"]这个参数进行判断
        $echoStr =input('echostr');
        //valid signature , option
        if($this->checkSignature()){
            //必须在这里增加header('content-type:text'); 否则，会报错“token验证失败”
            header('content-type:text');
            echo $echoStr;
            file_put_contents('str.txt',$echoStr);
            exit;
        }
    }


    private function checkSignature()
    {
        // you must define TOKEN by yourself
        if (!defined("TOKEN")) {
            throw new Exception('TOKEN is not defined!');
        }
        $signature = input('signature');
        $timestamp =input('timestamp');
        $nonce =input('nonce');
        $token = TOKEN;
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );
        if( $tmpStr == $signature ){
            return true;
        }else{
            return false;
        }
    }



    //接入之后进行的一个操作
    public function responseMsg()
    {
        //get post data, May be due to the different environments
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];//自动全局变量

        //extract post data
        if (!empty($postStr)){
            /* libxml_disable_entity_loader is to prevent XML eXternal Entity Injection,
               the best way is to check the validity of xml by yourself */
            libxml_disable_entity_loader(true);
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            //下面为获取参数信息，前面是获取的参数，后面是它的描述
            $fromUsername = $postObj->FromUserName; //开发者微信号
            $toUsername = $postObj->ToUserName; //接收方帐号
            $keyword = trim($postObj->Content); //关键字
            $Event = $postObj->Event; //关注与取消关注事件
            $time = time(); //时间
            $MsgType = $postObj->MsgType; //image 参数
            $EventKey = $postObj->EventKey; //事件key

            //$textTpl  是开发文档中的回复文字的格式，参照开发者文档》消息管理》被动回复用户消息》回复文本消息
            $textTpl = "<xml>
                            <ToUserName><![CDATA[%s]]></ToUserName>
                            <FromUserName><![CDATA[%s]]></FromUserName>
                            <CreateTime>%s</CreateTime>
                            <MsgType><![CDATA[%s]]></MsgType>
                            <Content><![CDATA[%s]]></Content>
                            <FuncFlag>0</FuncFlag>
                            </xml>";

            //当发送一条图片信息时，推送一条消息
            if($MsgType == "image"){
                // $MsgType = "text";
                $contentStr =' ';
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $contentStr);//将上面的信息发送到服务器的过程中需要传的参数
                echo $resultStr;
            }

            //点击菜单时，推送一条工菜单的消息
            if($Event == "CLICK" and $EventKey == "评价"){
                $textTpl = "<xml>
                            <ToUserName><![CDATA[%s]]></ToUserName>
                            <FromUserName><![CDATA[%s]]></FromUserName>
                            <CreateTime>%s</CreateTime>
                            <MsgType><![CDATA[news]]></MsgType>
                            <ArticleCount>1</ArticleCount>
                            <Articles>
                            <item>
                            <Title><![CDATA[欢迎参加东风满意度调查活动]]></Title>
                            <Description><![CDATA[点击进入评价页面]]></Description>
                            <PicUrl><![CDATA[http://ii.911cha.com/chebiao/123.jpg]]></PicUrl>
                            <Url><![CDATA[http://v8.meiwuvr.com/service/index.php?openid={$fromUsername}]]></Url>
                            </item>
                            </Articles>
                            </xml> ";
                // $MsgType = "text";
                // $contentStr = "你点击了11121";
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time);//将上面的信息发送到服务器的过程中需要传的参数
                echo $resultStr;
            }

            //订阅事件，回复图文
            //ArticleCount 2 说明有两个图文，限制炎10条
            //Articles 多图文标志，里面有几个item就有几个图文
            //Description 图文描述消息
            //PicUrl 图片地址
            //如何替换 修改CDATA数组内的内容即可，只修改item的东西就可以，ToUserName~CreateTime是不需要修改的，MsgType要改为news
            //$textTpl  是开发文档中的回复文字的格式，参照开发者文档》消息管理》被动回复用户消息》回复图文消息
            if($Event == "subscribe"){
                $textTpl = "<xml>
                            <ToUserName><![CDATA[%s]]></ToUserName>
                            <FromUserName><![CDATA[%s]]></FromUserName>
                            <CreateTime>%s</CreateTime>
                            <MsgType><![CDATA[news]]></MsgType>
                            <ArticleCount>1</ArticleCount>
                            <Articles>
                            <item>
                            <Title><![CDATA[欢迎关注东风卡车之友]]></Title>
                            <Description><![CDATA[点击参与满意度调查吧！]]></Description>
                            <PicUrl><![CDATAhttp://ii.911cha.com/chebiao/123.jpg]]></PicUrl>
                            <Url><![CDATA[http://v8.meiwuvr.com/service/index.php?openid=$fromUsername]]></Url>
                            </item>
                            </Articles>
                            </xml> ";
                //发送到服务器的过程需要传的参数
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time);//将上面的信息发送到服务器的过程
                echo $resultStr;
            }


            //回复关键字，回复图文消息。定义关键字为“评价”
            if(!empty( $keyword )){
                if($keyword == "阳光服务"){
                    //下面为图文回复
                    $textTpl = "<xml>
                            <ToUserName><![CDATA[%s]]></ToUserName>
                            <FromUserName><![CDATA[%s]]></FromUserName>
                            <CreateTime>%s</CreateTime>
                            <MsgType><![CDATA[news]]></MsgType>
                            <ArticleCount>1</ArticleCount>
                            <Articles>
                            <item>
                            <Title><![CDATA[欢迎参加东风满意度调查活动]]></Title>
                            <Description><![CDATA[点击进入评价页面]]></Description>
                            <PicUrl><![CDATA[http://ii.911cha.com/chebiao/123.jpg]]></PicUrl>
                            <Url><![CDATA[http://v8.meiwuvr.com/service/index.php?openid={$fromUsername}]]></Url>
                            </item>
                            </Articles>
                            </xml> ";
                    //发送到服务器的过程需要传的参数
                    $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time);//将上面的信息发送到服务器的过程
                    echo $resultStr;
                }else{
                    //echo "Input something...";
                }
            }

            //订阅事件，要先回复文字，
            //当Event为subscribe时，它就是订阅事件，参照开发者文档》消息管理》接收事件推送》关注/取消事件的参数说明
//            if($Event == "subscribe") {
//                //把下面的回复关键字复制上来，修改下消息
//                $msgType = "text";
//                $contentStr = "欢迎关注东风卡车之友";
//                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);//将上面的信息发送到服务器的过程中需要传的参数
//                echo $resultStr;
//            }


            //关键字回复文字
            if(!empty( $keyword ))
            {
                $MsgType = "text";
                $contentStr = " ";
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $MsgType, $contentStr);//将上面的信息发送到服务器的过程中需要传的参数
                echo 'success';

            }else{
                // echo "Input something...";
            }

        }else {
            echo "";
            exit;
        }
    }


}

