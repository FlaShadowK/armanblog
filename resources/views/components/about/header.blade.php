{{--        <header class="masthead" style="background-image: url('assets/img/about-bg.jpg')">--}}
<header class="masthead" style="background-image: url('{{App\Models\User::findOrFail(1)->picture}}')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <h1>About Me</h1>
                    <span class="subheading">This is what I do.</span>
                </div>
            </div>
        </div>
    </div>
</header>
