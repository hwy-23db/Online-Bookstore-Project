<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Store Website</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="bookproject/style.css">
</head>
<body>  
    <?php include'userheader.php'?> 
    <section>

        <div class="main">

            <div class="main_tag">
                

                <h1>WELCOME TO<br><span><i>BOOK PALACE</i></span></h1>

                <p>
                    <i>Books are the constant companions of those who find solace 
                        in the stories
                        <br>
                        A book a day keeps the reality away!
                    </i>
                </p>

            </div>

            <div class="main_img">
                <img src="photos/table 2.png">
            </div>

        </div>

    </section>
    <br><br><br>

 
 <!--Books-->
 
 <h1 style="font-weight: bolder;  text-align: center;" >စာအုပ်အမျိုးအစားများ (Book Categories)</h1>
 <div class="stand">
    <img  class="stand-img" src="photos/stand 1.png" alt=""  width="500px" height="200px"/>
  <a >ရသ & သုတ</a>
</div>
<div class="stand">
    <img  class="stand-img" src="photos/stand 2.png" alt=""  width="500px" height="200px"/>
    <a >နိုင်ငံရေး & သမိုင်း</a>
</div>
<div class="stand">
    <img  class="stand-img" src="photos/stand3.png" alt=""  width="500px" height="200px"/>
    <a>ကလေးစာပေ</a>
</div>
<div class="stand">
    <img  class="stand-img" src="photos/stand 4.png" alt=""  width="500px" height="200px"/>
    <a >စာနယ်ဇင်း &မဂ္ဂဇင်း</a>
</div>
<div class="stand">
    <img  class="stand-img" src="photos/stand 5.png" alt=""  width="500px" height="200px"/>
    <a >ကျန်းမာရေး </a>
</div>
<div class="stand">
    <img  class="stand-img" src="photos/stand 6.png" alt=""  width="500px" height="200px"/>
    <a>LGBT, Romance စာအုပ်များ </a>
</div>
<br><br><br>

<!-- bestseller -->
        <h1 style="text-align: center;">အရောင်းရဆုံး စာအုပ်များ(Best Seller)</h1>
        <div class="best-seller">
            <div class="best-seller-details">
            <a href="photos/lgbt 8.html"><img src="photos/Lgbt 8.jpg" alt="" width="300px" height="250px"></a>
            </div>
          
        </div>

        <div class="best-seller">
            <div class="best-seller-details">
           <a href="photos/health 10.html"> <img src="photos/health 10.png" alt="" width="300px" height="250px"></a>
            </div>
           
        </div>

        <div class="best-seller">
            <div class="best-seller-details">
            <img src="photos/national 1.png" alt="" width="300px" height="250px">
            </div>
           
        </div>

        <div class="best-seller">
            <div class="best-seller-details">
            <img src="photos/yatha 5.png" alt="" width="300px" height="250px">
            </div>
           
        </div>
        <br>
        <button class="btn-book" ><a href="bestseller.php">ပိုမိုရှာရန်</a></button>
    <br><br>
   <!--Arrivals-->
   <h1 style="text-align: center;">အသစ်ထွက်စာအုပ်များ (New Releases)</h1>

   <div class="best-seller">
    <div class="best-seller-details">
    <img src="photos/national 10.png" alt="" width="300px" height="250px">
    </div>
  
</div>

<div class="best-seller">
    <div class="best-seller-details">
    <a href="photo/yatha 18.html"><img src="photos/yatha 18.png" alt="" width="300px" height="250px"></a>
    </div>
   
</div>

<div class="best-seller">
    <div class="best-seller-details">
    <a href="photos/children 11.html"><img src="photos/children 11.png" alt="" width="300px" height="250px"></a>
    </div>
   
</div>

<div class="best-seller">
    <div class="best-seller-details">
    <img src="photos/yatha10.png" alt="" width="300px" height="250px">
    </div>
   
</div>

<br>
<button class="btn-book" ><a href="newrelease.php">ပိုမိုရှာရန်</a></button>
   
<br><br><br>






  <!--Services-->
  <h2 style="text-align: center;">ဝန်ဆောင်မှု(Services)</h2><br>
  <div class="wh-card">
    <div class="card">
      <img src="photos/Delivery.png" alt="" width="350px" height="200px">
      <div class="card__content">
        <p class="card__title">ပို့ဆောင်မှုကြာမြင့်ချိန် (Delivery Time)</p>
        <p class="card__description">အမှာအတည်ပြုပြီးချိန်မှ ၂ နာရီအတွင်း ထုပ်ပိုးပြီးစီး။ (ရုံးဖွင့်ရက်) ၂၄ နာရီ အတွင်း စတင်ပို့ဆောင်ပါမည်….
          ရန်ကုန်မြို့တွင်း (၃ ရက်မှ  ၅ ရက်) အတွင်း
          နယ်မြို့များ (၅ ရက်မှ ၇  ရက်) အတွင်း
          ပြည်ပနိုင်ငံများ (၅ ရက်မှ ၁၅)  ရက် အတွင်း မှာယူထားသည့် စာအုပ်များ ရောက်ရှိလာမှာဖြစ်ပါသည်။</p>
      </div>
    </div>
    <div class="card">
      <img src="photos/payment.png" alt="" width="350px" height="200px">
      <div class="card__content">
          
        <p class="card__title">ပို့ဆောင်ခ(Delivery Charges)</p>
        <p class="card__description">  ပြည်တွင်းပို့ အခြေခံပို့ခမှာ ပထမတစ်အုပ် ၂၀၀၀ ကျပ် + ထပ်တိုးတစ်အုပ် ၁၀၀ ကျပ် ဖြစ်ပါသည်။ 
          လေကြောင်းပို့/နှစ်ဆင့်ပို့ မြို့တချို့အတွက်သာ ပို့ခအနည်းငယ် ပိုနိုင်ပါသည်…
          ပြည်ပပို့ဆောင်မှုအတွက် 
          ပို့ခမှာ အလေးချိန်နှင့် နိုင်ငံအကွာအဝေးပေါ်မူတည်ကောက်ခံသည့် နှုန်းထားဖြစ်ပါသည်…
      </p>
      </div>
    </div>
    <div class="card">
      <img src="photos/gift.png" alt="" width="230px" height="200px">
      <div class="card__content">
          
        <p class="card__title">စာအုပ်ဖုံး စာမှတ်ကတ် အခမဲ့လက်ဆောင်(Gift)</p>
        <p class="card__description">  စာအုပ်တစ်အုပ်စီတိုင်းအတွက် စာမှတ်ကတ်နှင့် ပလတ်စတစ်စာအုပ်ဖုံးလေးကို တစ်သက်တာလက်ဆောင်အဖြစ် အခမဲ့ရရှိမှာဖြစ်ပါတယ်။ 
          ဖတ်လက်စနေရာကို အလွယ်တကူ မှတ်သားနိုင်စေဖို့နှင့် စာအုပ်တွေကို ညစ်နွမ်းမသွားစေဘဲ တစ်သက်တာ သိမ်းဆည်းထားနိုင်ဖို့ ဖြစ်ပါတယ်…</p>
      </div>
    </div>
  </div>
    


<br><br>
<?php include 'userfooter.php' ?>
</body>
</html>


    