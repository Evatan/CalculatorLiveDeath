<?php
if (isset($_GET['date_time'])) {
   $date_time=$_GET['date_time'];
}
date_default_timezone_set('PRC'); 
$dob = strtotime($date_time);
$y = date('Y', $dob);
 if (($m = (date('m') - date('m', $dob))) < 0) {
  $y++;
 } elseif ($m == 0 && date('d') - date('d', $dob) < 0) {
  $y++;
 }
$nian= date('Y') - $y;

$d1=strtotime ("now");
$d2=strtotime($date_time);
$nian3=round(($d1-$d2)/3600/24/365);
$nian2=($d1-$d2)/3600/24/365;
$Days=round(($d1-$d2)/3600/24);
$yue=round(($d1-$d2)/3600/24/30);
$zhou=round(($d1-$d2)/3600/24/7);
$xiaoshi=round(($d1-$d2)/3600);
$fen=round(($d1-$d2)/60);
$miao=round(($d1-$d2));
$s_Days=36500-$Days;
$s_fan=$s_Days * 3;
$s_zao=$s_Days / 2;
$s_bing=100 - $nian3;
$s_zhou=round($s_Days / 7);
$s_pi=$s_Days * 5;
$s_meng=$s_Days * 10;
$s_chaojia=round($s_Days / 60);
$s_zhayan=$s_Days * 100;
$s_lei=round($s_Days / 15);
$s_hang=round($s_Days / 7);
$s_zhijia=round($s_Days / 20);
$s_shui=$s_Days * 8;
$s_lanyao=round($s_Days * 5.2);
$s_haqian=round($s_Days * 7.4)
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="gb2312">
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<meta name="format-detection" content="telephone=no"/>


<link href="http://cdn.bootcss.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/lift.css" />


<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<?php require ('weixin_sdk.php'); ?>  
<script>
wx.ready(function () {
  var shareData = {

      title: '今天是我活着的第<?php echo $Days; ?>天,未来我还将拥有<?php echo $s_Days; ?>天',
      desc: '珍惜生活，感恩每一个遇到的朋友，生命万岁',
      link: '这里设置分享后跳转网址',
      imgUrl: '这里设置分享显示图片',
      trigger: function (res) {
//        alert('用户点击发送给朋友');
      },
      success: function (res) {
//        alert('已分享');
        location.href = '<?php echo $weixin_url; ?>';
      },
      cancel: function (res) {
        alert("别这样的啦，好东西要和朋友分享的嘛！");
//        location.href = '<?php echo $weixin_url; ?>';
      },
      fail: function (res) {
//        alert(JSON.stringify(res));
      }
  };
  wx.onMenuShareAppMessage(shareData);
  wx.onMenuShareTimeline(shareData);
  wx.onMenuShareQQ(shareData);
  wx.onMenuShareWeibo(shareData);
});
wx.error(function (res) {
//  alert(res.errMsg);
}); 
</script>

<title>生命计算器</title>
</head>
<body class="l_list l_list2">
    <div class="container">
        <div class="media">
          <div class="media-left">
            <a href="#">
              <img alt="64x64"  class="media-object img-circle" style="width: 64px; height: 64px;" src="images/a2.png">
            </a>
          </div>
          <div class="media-body">
            <h5 class="media-heading text-muted">假如你能活100岁，你还能存在</h5>
            <h3><strong><?php echo $s_Days; ?>天</strong>
<a href="<?php echo $weixin_url; ?>" class="btn btn-vip btn-default btn-sm pull-right">源码之哥</a>
</h3>
          </div>
        </div>
      </div>
    </div>
    </div> <!-- E header -->


    <div class="list_area container">
        <ul class="list-unstyled">
            <li class="list_first"> <h6 class="text-muted">剩下的日子里，你大约可以</h6> </li>
            <li> 睡 <strong><?php echo $s_Days; ?></strong> 次觉 </li>
            <li> 吃 <strong><?php echo $s_fan; ?></strong> 顿饭 </li>
            <li> 洗 <strong><?php echo $s_zao; ?></strong> 次澡 </li>
            <li> 生 <strong><?php echo $s_bing; ?></strong></strong> 次病 </li>
             <li> 过 <strong><?php echo $s_zhou; ?></strong> 个周末 </li>
            <li> 放 <strong><?php echo $s_pi; ?></strong> 个屁 </li>
            <li> 做 <strong><?php echo $s_meng; ?></strong> 个梦 </li>
            <li> 吵 <strong><?php echo $s_chaojia; ?></strong> 次架 </li>
            <li> 眨 <strong><?php echo $s_zhayan; ?></strong> 次眼 </li>
            <li> 流 <strong><?php echo $s_lei; ?></strong> 次泪 </li>
            <li> 说 <strong><?php echo $s_hang; ?></strong> 次谎 </li>
            <li> 剪 <strong><?php echo $s_zhijia; ?></strong> 次指甲 </li>
            <li> 喝 <strong><?php echo $s_shui; ?></strong> 杯水 </li>
            <li> 伸 <strong><?php echo $s_lanyao; ?></strong>个懒腰 </li>
            <li> 打 <strong><?php echo $s_haqian; ?></strong>次哈欠 </li>
        </ul>

        <div class="buttons text-center">
            <a href="view.php?date_time=<?php echo $date_time; ?>" class="btn btn-default btn-lg"><strong>现在</strong></a>

            <p class="text-muted"><a href="<?php echo $weixin_url; ?>">关注一个让你开心的账号</a></p>

            <p class="text-muted"><a href="<?php echo $weixin_url; ?>"> 源码之哥 </a> </p>
        </div> <!-- E buttons -->
   </div> <!-- E list_area -->

</body>
</html>
