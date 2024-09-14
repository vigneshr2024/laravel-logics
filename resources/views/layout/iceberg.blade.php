<div class="row">
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            min-height: 1000px;
            background-color: transparent;
        }

        section {
            position: relative;
            min-height: 700px;
            width: 100%;
            height: 100vh;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: transparent;
        }

        section:before {
            content: '';
            position: absolute;
            bottom: 0;
            width: 100%;
            height: auto;
            background: linear-gradient(to top, rgb(0, 0, 0), transparent);
            z-index: 100;
        }


        section img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: auto;
            object-fit: cover;
            pointer-events: none;
            opacity: 0;
            z-index: 2;
        }

        #bg {
            opacity: 1;
        }

        #mountain-bg {
            z-index: 0;
            opacity: 1;
            transform: translateY(0);
            transition: transform 0.1s ease-out;
        }

        .text {
            position: relative;
            margin: -0.9em;
            top: -150px;
            padding: 0.1em;
            overflow: hidden;
            z-index: 1;
            text-align: center;
        }

        .bottom-text {
            position: absolute;
            bottom: 0px;
            left: 0;
            width: 100%;
            padding: 0.1em;
            opacity: 0 ; 
            transition: opacity 0.3s ease-in-out;
            z-index: 2;
           
        }

        @media (max-width: 1399px) {
            .home1-banner-section {
                padding: 0 0 0 0 !important;
            }
        }

        /* Extra small screens (phones, less than 576px) */
        @media (max-width: 575.98px) {
            .home1-banner-section {
                padding: 0 0 0 0 !important;
            }
        }

        /* Small screens (phones, 576px and up) */
        @media (min-width: 576px) {
            .home1-banner-section {
                padding: 0 0 0 0 !important;
            }
        }

        /* Medium screens (tablets, 768px and up) */
        @media (min-width: 768px) {
            .home1-banner-section {
                padding: 0 0 0 0 !important;
            }
        }

        /* Large screens (desktops, 992px and up) */
        @media (min-width: 992px) {
            .home1-banner-section {
                padding: 0 0 0 0 !important;
            }
        }

        /* Extra large screens (large desktops, 1200px and up) */
        @media (min-width: 1200px) {
            .home1-banner-section {
                padding: 0 0 0 0 !important;
            }
        }

        /* Extra extra large screens (larger desktops, 1400px and up) */
        @media (min-width: 1400px) {
            .home1-banner-section {
                padding: 0 0 0 0 !important;
            }
        }
    </style>

    <!-- <body> -->
    <section id="parllax">
        <img src="{{ asset('assets/img/ice_berg_v4/background/BG_V9.webp') }}" class="img-fluid" id="mountain-bg" />
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00000.webp') }}" class="img-fluid" id="bg">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00001.webp') }}" class="img-fluid" id="bg01">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00002.webp') }}" class="img-fluid" id="bg02">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00003.webp') }}" class="img-fluid" id="bg03">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00004.webp') }}" class="img-fluid" id="bg04">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00005.webp') }}" class="img-fluid" id="bg05">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00006.webp') }}" class="img-fluid" id="bg06">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00007.webp') }}" class="img-fluid" id="bg07">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00008.webp') }}" class="img-fluid" id="bg08">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00009.webp') }}" class="img-fluid" id="bg09">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00010.webp') }}" class="img-fluid" id="bg10">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00011.webp') }}" class="img-fluid" id="bg11">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00012.webp') }}" class="img-fluid" id="bg12">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00013.webp') }}" class="img-fluid" id="bg13">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00014.webp') }}" class="img-fluid" id="bg14">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00015.webp') }}" class="img-fluid" id="bg15">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00016.webp') }}" class="img-fluid" id="bg16">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00017.webp') }}" class="img-fluid" id="bg17">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00018.webp') }}" class="img-fluid" id="bg18">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00019.webp') }}" class="img-fluid" id="bg19">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00020.webp') }}" class="img-fluid" id="bg20">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00021.webp') }}" class="img-fluid" id="bg21">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00022.webp') }}" class="img-fluid" id="bg22">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00023.webp') }}" class="img-fluid" id="bg23">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00024.webp') }}" class="img-fluid" id="bg24">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00025.webp') }}" class="img-fluid" id="bg25">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00026.webp') }}" class="img-fluid" id="bg26">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00027.webp') }}" class="img-fluid" id="bg27">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00028.webp') }}" class="img-fluid" id="bg28">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00029.webp') }}" class="img-fluid" id="bg29">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00030.webp') }}" class="img-fluid" id="bg30">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00031.webp') }}" class="img-fluid" id="bg31">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00032.webp') }}" class="img-fluid" id="bg32">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00033.webp') }}" class="img-fluid" id="bg33">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00034.webp') }}" class="img-fluid" id="bg34">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00035.webp') }}" class="img-fluid" id="bg35">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00036.webp') }}" class="img-fluid" id="bg36">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00037.webp') }}" class="img-fluid" id="bg37">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00038.webp') }}" class="img-fluid" id="bg38">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00039.webp') }}" class="img-fluid" id="bg39">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00040.webp') }}" class="img-fluid" id="bg40">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00041.webp') }}" class="img-fluid" id="bg41">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00042.webp') }}" class="img-fluid" id="bg42">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00043.webp') }}" class="img-fluid" id="bg43">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00044.webp') }}" class="img-fluid" id="bg44">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00045.webp') }}" class="img-fluid" id="bg45">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00046.webp') }}" class="img-fluid" id="bg46">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00047.webp') }}" class="img-fluid" id="bg47">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00048.webp') }}" class="img-fluid" id="bg48">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00049.webp') }}" class="img-fluid" id="bg49">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00050.webp') }}" class="img-fluid" id="bg50">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00051.webp') }}" class="img-fluid" id="bg51">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00052.webp') }}" class="img-fluid" id="bg52">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00053.webp') }}" class="img-fluid" id="bg53">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00054.webp') }}" class="img-fluid" id="bg54">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00055.webp') }}" class="img-fluid" id="bg55">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00056.webp') }}" class="img-fluid" id="bg56">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00057.webp') }}" class="img-fluid" id="bg57">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00058.webp') }}" class="img-fluid" id="bg58">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00059.webp') }}" class="img-fluid" id="bg59">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00060.webp') }}" class="img-fluid" id="bg60">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00061.webp') }}" class="img-fluid" id="bg61">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00062.webp') }}" class="img-fluid" id="bg62">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00063.webp') }}" class="img-fluid" id="bg63">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00064.webp') }}" class="img-fluid" id="bg64">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00065.webp') }}" class="img-fluid" id="bg65">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00066.webp') }}" class="img-fluid" id="bg66">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00067.webp') }}" class="img-fluid" id="bg67">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00068.webp') }}" class="img-fluid" id="bg68">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00069.webp') }}" class="img-fluid" id="bg69">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00070.webp') }}" class="img-fluid" id="bg70">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00071.webp') }}" class="img-fluid" id="bg71">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00072.webp') }}" class="img-fluid" id="bg72">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00073.webp') }}" class="img-fluid" id="bg73">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00074.webp') }}" class="img-fluid" id="bg74">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00075.webp') }}" class="img-fluid" id="bg75">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00076.webp') }}" class="img-fluid" id="bg76">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00077.webp') }}" class="img-fluid" id="bg77">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00078.webp') }}" class="img-fluid" id="bg78">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00079.webp') }}" class="img-fluid" id="bg79">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00080.webp') }}" class="img-fluid" id="bg80">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00081.webp') }}" class="img-fluid" id="bg81">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00082.webp') }}" class="img-fluid" id="bg82">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00083.webp') }}" class="img-fluid" id="bg83">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00084.webp') }}" class="img-fluid" id="bg84">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00085.webp') }}" class="img-fluid" id="bg85">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00086.webp') }}" class="img-fluid" id="bg86">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00087.webp') }}" class="img-fluid" id="bg87">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00088.webp') }}" class="img-fluid" id="bg88">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00089.webp') }}" class="img-fluid" id="bg89">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00090.webp') }}" class="img-fluid" id="bg90">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00091.webp') }}" class="img-fluid" id="bg91">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00092.webp') }}" class="img-fluid" id="bg92">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00093.webp') }}" class="img-fluid" id="bg93">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00094.webp') }}" class="img-fluid" id="bg94">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00095.webp') }}" class="img-fluid" id="bg95">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00096.webp') }}" class="img-fluid" id="bg96">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00097.webp') }}" class="img-fluid" id="bg97">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00098.webp') }}" class="img-fluid" id="bg98">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00099.webp') }}" class="img-fluid" id="bg99">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00100.webp') }}" class="img-fluid" id="bg100">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00101.webp') }}" class="img-fluid" id="bg101">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00102.webp') }}" class="img-fluid" id="bg102">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00103.webp') }}" class="img-fluid" id="bg103">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00104.webp') }}" class="img-fluid" id="bg104">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00105.webp') }}" class="img-fluid" id="bg105">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00106.webp') }}" class="img-fluid" id="bg106">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00107.webp') }}" class="img-fluid" id="bg107">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00108.webp') }}" class="img-fluid" id="bg108">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00109.webp') }}" class="img-fluid" id="bg109">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00110.webp') }}" class="img-fluid" id="bg110">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00111.webp') }}" class="img-fluid" id="bg111">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00112.webp') }}" class="img-fluid" id="bg112">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00113.webp') }}" class="img-fluid" id="bg113">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00114.webp') }}" class="img-fluid" id="bg114">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00115.webp') }}" class="img-fluid" id="bg115">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00116.webp') }}" class="img-fluid" id="bg116">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00117.webp') }}" class="img-fluid" id="bg117">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00118.webp') }}" class="img-fluid" id="bg118">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00119.webp') }}" class="img-fluid" id="bg119">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00120.webp') }}" class="img-fluid" id="bg120">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00121.webp') }}" class="img-fluid" id="bg121">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00122.webp') }}" class="img-fluid" id="bg122">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00123.webp') }}" class="img-fluid" id="bg123">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00124.webp') }}" class="img-fluid" id="bg124">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00125.webp') }}" class="img-fluid" id="bg125">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00126.webp') }}" class="img-fluid" id="bg126">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00127.webp') }}" class="img-fluid" id="bg127">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00128.webp') }}" class="img-fluid" id="bg128">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00129.webp') }}" class="img-fluid" id="bg129">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00130.webp') }}" class="img-fluid" id="bg130">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00131.webp') }}" class="img-fluid" id="bg131">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00132.webp') }}" class="img-fluid" id="bg132">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00133.webp') }}" class="img-fluid" id="bg133">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00134.webp') }}" class="img-fluid" id="bg134">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00135.webp') }}" class="img-fluid" id="bg135">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00136.webp') }}" class="img-fluid" id="bg136">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00137.webp') }}" class="img-fluid" id="bg137">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00138.webp') }}" class="img-fluid" id="bg138">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00139.webp') }}" class="img-fluid" id="bg139">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00140.webp') }}" class="img-fluid" id="bg140">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00141.webp') }}" class="img-fluid" id="bg141">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00142.webp') }}" class="img-fluid" id="bg142">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00143.webp') }}" class="img-fluid" id="bg143">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00144.webp') }}" class="img-fluid" id="bg144">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00145.webp') }}" class="img-fluid" id="bg145">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00146.webp') }}" class="img-fluid" id="bg146">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00147.webp') }}" class="img-fluid" id="bg147">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00148.webp') }}" class="img-fluid" id="bg148">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00149.webp') }}" class="img-fluid" id="bg149">
        <img src="{{ asset('assets/img/ice_berg_v4/ICE_BERG_V9_00150.webp') }}" class="img-fluid" id="bg150">
        <div class="text">
            <h1 class="display-5"><span style="color:blue">Dive</span> deeper to go <br>beyond the evolution</h1>
        </div>
        <div class="bottom-text">
            <h5 class="display-6 text-center p-5 text-light">Welcome to the cloud <br>where efficiency meets innovation</h5>
        </div>

    </section>
    <!-- </body> -->
    <script type="text/javascript">
        let images = [
            document.getElementById("bg"),
            document.getElementById("bg01"),
            document.getElementById("bg02"),
            document.getElementById("bg03"),
            document.getElementById("bg04"),
            document.getElementById("bg05"),
            document.getElementById("bg06"),
            document.getElementById("bg07"),
            document.getElementById("bg08"),
            document.getElementById("bg09"),
            document.getElementById("bg10"),
            document.getElementById("bg11"),
            document.getElementById("bg12"),
            document.getElementById("bg13"),
            document.getElementById("bg14"),
            document.getElementById("bg15"),
            document.getElementById("bg16"),
            document.getElementById("bg17"),
            document.getElementById("bg18"),
            document.getElementById("bg19"),
            document.getElementById("bg20"),
            document.getElementById("bg21"),
            document.getElementById("bg22"),
            document.getElementById("bg23"),
            document.getElementById("bg24"),
            document.getElementById("bg25"),
            document.getElementById("bg26"),
            document.getElementById("bg27"),
            document.getElementById("bg28"),
            document.getElementById("bg29"),
            document.getElementById("bg30"),
            document.getElementById("bg31"),
            document.getElementById("bg32"),
            document.getElementById("bg33"),
            document.getElementById("bg34"),
            document.getElementById("bg35"),
            document.getElementById("bg36"),
            document.getElementById("bg37"),
            document.getElementById("bg38"),
            document.getElementById("bg39"),
            document.getElementById("bg40"),
            document.getElementById("bg41"),
            document.getElementById("bg42"),
            document.getElementById("bg43"),
            document.getElementById("bg44"),
            document.getElementById("bg45"),
            document.getElementById("bg46"),
            document.getElementById("bg47"),
            document.getElementById("bg48"),
            document.getElementById("bg49"),
            document.getElementById("bg50"),
            document.getElementById("bg51"),
            document.getElementById("bg52"),
            document.getElementById("bg53"),
            document.getElementById("bg54"),
            document.getElementById("bg55"),
            document.getElementById("bg56"),
            document.getElementById("bg57"),
            document.getElementById("bg58"),
            document.getElementById("bg59"),
            document.getElementById("bg60"),
            document.getElementById("bg61"),
            document.getElementById("bg62"),
            document.getElementById("bg63"),
            document.getElementById("bg64"),
            document.getElementById("bg65"),
            document.getElementById("bg66"),
            document.getElementById("bg67"),
            document.getElementById("bg68"),
            document.getElementById("bg69"),
            document.getElementById("bg70"),
            document.getElementById("bg71"),
            document.getElementById("bg72"),
            document.getElementById("bg73"),
            document.getElementById("bg74"),
            document.getElementById("bg75"),
            document.getElementById("bg76"),
            document.getElementById("bg77"),
            document.getElementById("bg78"),
            document.getElementById("bg79"),
            document.getElementById("bg80"),
            document.getElementById("bg81"),
            document.getElementById("bg82"),
            document.getElementById("bg83"),
            document.getElementById("bg84"),
            document.getElementById("bg85"),
            document.getElementById("bg86"),
            document.getElementById("bg87"),
            document.getElementById("bg88"),
            document.getElementById("bg89"),
            document.getElementById("bg90"),
            document.getElementById("bg91"),
            document.getElementById("bg92"),
            document.getElementById("bg93"),
            document.getElementById("bg94"),
            document.getElementById("bg95"),
            document.getElementById("bg96"),
            document.getElementById("bg97"),
            document.getElementById("bg98"),
            document.getElementById("bg99"),
            document.getElementById("bg100"),
            document.getElementById("bg101"),
            document.getElementById("bg102"),
            document.getElementById("bg103"),
            document.getElementById("bg104"),
            document.getElementById("bg105"),
            document.getElementById("bg106"),
            document.getElementById("bg107"),
            document.getElementById("bg108"),
            document.getElementById("bg109"),
            document.getElementById("bg110"),
            document.getElementById("bg111"),
            document.getElementById("bg112"),
            document.getElementById("bg113"),
            document.getElementById("bg114"),
            document.getElementById("bg115"),
            document.getElementById("bg116"),
            document.getElementById("bg117"),
            document.getElementById("bg118"),
            document.getElementById("bg119"),
            document.getElementById("bg120"),
            document.getElementById("bg121"),
            document.getElementById("bg122"),
            document.getElementById("bg123"),
            document.getElementById("bg124"),
            document.getElementById("bg125"),
            document.getElementById("bg126"),
            document.getElementById("bg127"),
            document.getElementById("bg128"),
            document.getElementById("bg129"),
            document.getElementById("bg130"),
            document.getElementById("bg131"),
            document.getElementById("bg132"),
            document.getElementById("bg133"),
            document.getElementById("bg134"),
            document.getElementById("bg135"),
            document.getElementById("bg136"),
            document.getElementById("bg137"),
            document.getElementById("bg138"),
            document.getElementById("bg139"),
            document.getElementById("bg140"),
            document.getElementById("bg141"),
            document.getElementById("bg142"),
            document.getElementById("bg143"),
            document.getElementById("bg144"),
            document.getElementById("bg145"),
            document.getElementById("bg146"),
            document.getElementById("bg147"),
            document.getElementById("bg148"),
            document.getElementById("bg149"),
            document.getElementById("bg150"),
        ];
        let mountainBg = document.getElementById("mountain-bg");
        let scrollPos = 0;
        let targetScrollPos = 0;
        let maxScroll = document.body.scrollHeight - window.innerHeight;
        let scrollStep = maxScroll / (images.length - 1);
        let isScrolling = false;
        let imageSection = document.getElementById("parllax");
        let scrollMultiplier = 0.07; // Adjust scroll speed
        let lastImageThreshold = images.length - 110;
        let normalScrollThreshold = images.length - 30; // Idendify or Threshold for the last 30-40 images
        let touchStartY = 0;
        let touchCurrentY = 0;
        let textBottom = document.querySelector(".bottom-text");// to get the bottom text name
        // Smooth scroll interpolation for the image section
        function smoothScroll() {
            if (!isScrolling) return;

            scrollPos += (targetScrollPos - scrollPos) * 0.05; // Smoothing factor

            // Determine the index of the image to display
            let index = Math.floor(scrollPos / scrollStep);
            index = Math.min(index, images.length - 1); // Ensure index is within bounds

            // Hide all images and show the current one
            images.forEach((image, i) => {
                image.style.opacity = i === index ? 1 : 0;
            });

            // Parallax effect for the background
            let mountainOffset = scrollPos * 0.05; // Adjust parallax effect
            mountainBg.style.transform = `translate3d(0, -${mountainOffset}px, 0)`;
            //Bottom text scrolling
            if (index >= lastImageThreshold) {
                textBottom.style.opacity = 1; // Make text visible
                textBottom.style.transform = `translateY(-${scrollPos * 0.5}px)`;
            } else {
                textBottom.style.opacity = 0; // Hide text
                textBottom.style.transform = `translateY(-${scrollPos * 0.5}px)`;
            }
            // Update maxScroll if content dynamically changes
            maxScroll = document.body.scrollHeight - window.innerHeight;

            if (Math.abs(targetScrollPos - scrollPos) > 0.1) {
                requestAnimationFrame(smoothScroll);
            } else {
                isScrolling = false;
            }
        }

        // Handle scroll events for the image section
        function handleParallaxScroll() {
            if (window.scrollY >= imageSection.offsetTop && window.scrollY <= imageSection.offsetTop + imageSection.offsetHeight) {
                targetScrollPos = window.scrollY; // Set target based on current scroll position

                if (!isScrolling) {
                    isScrolling = true;
                    requestAnimationFrame(smoothScroll); // Start the smooth scroll interpolation
                }
            }
        }

        // Handle mouse wheel and touchpad events for smooth scrolling in the image section
        function handleMouseWheel(event) {
            if (window.scrollY >= imageSection.offsetTop && window.scrollY <= imageSection.offsetTop + imageSection.offsetHeight) {
                event.preventDefault(); // Prevent default scroll behavior in the image section

                let delta = event.deltaY;

                // Check if we're within the last 30-40 images
                let index = Math.floor(targetScrollPos / scrollStep);
                if (index >= normalScrollThreshold) {
                    // Use normal scrolling speed for the last 30-40 images
                    delta = event.deltaY; // Keep default scroll behavior
                } else {
                    // Slow down the scroll sensitivity in the image section
                    delta = event.deltaY * scrollMultiplier;
                }

                targetScrollPos += delta; // Increase/decrease the target scroll position

                // Clamp the target scroll position between 0 and maxScroll
                targetScrollPos = Math.max(0, Math.min(targetScrollPos, maxScroll));

                if (!isScrolling) {
                    isScrolling = true;
                    requestAnimationFrame(smoothScroll); // Start the smooth scroll interpolation
                }

                // Sync the page scroll with the target to ensure smoothness in the image section
                window.scrollTo(0, targetScrollPos);
            }
        }

        // Handle touch events for smooth scrolling
        function handleTouchStart(event) {
            touchStartY = event.touches[0].clientY; // Get the starting touch Y position
        }

        function handleTouchMove(event) {
            touchCurrentY = event.touches[0].clientY; // Get the current touch Y position
            let delta = touchStartY - touchCurrentY; // Calculate the touch movement

            if (window.scrollY >= imageSection.offsetTop && window.scrollY <= imageSection.offsetTop + imageSection.offsetHeight) {
                event.preventDefault(); // Prevent default scroll behavior in the image section

                // Check if we're within the last 30-40 images
                let index = Math.floor(targetScrollPos / scrollStep);
                if (index >= normalScrollThreshold) {
                    // Use normal scrolling speed for the last 30-40 images
                    delta = touchStartY - touchCurrentY;
                } else {
                    // Slow down the scroll sensitivity in the image section
                    delta = (touchStartY - touchCurrentY) * scrollMultiplier;
                }

                targetScrollPos += delta; // Increase/decrease the target scroll position

                // Clamp the target scroll position between 0 and maxScroll
                targetScrollPos = Math.max(0, Math.min(targetScrollPos, maxScroll));

                if (!isScrolling) {
                    isScrolling = true;
                    requestAnimationFrame(smoothScroll); // Start the smooth scroll interpolation
                }

                // Sync the page scroll with the target to ensure smoothness in the image section
                window.scrollTo(0, targetScrollPos);
            }
        }

        // Attach event listeners for scroll, mouse wheel, and touch events
        window.addEventListener('scroll', handleParallaxScroll);
        window.addEventListener('wheel', handleMouseWheel, {
            passive: false
        });
        window.addEventListener('touchstart', handleTouchStart, {
            passive: false
        });
        window.addEventListener('touchmove', handleTouchMove, {
            passive: false
        });

        // Apply smooth scroll behavior via CSS for supported browsers
        document.documentElement.style.scrollBehavior = 'smooth';
    </script>

</div>