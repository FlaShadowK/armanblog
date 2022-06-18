<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">

                <img src="{{App\Models\User::findOrFail(1)->picture}}" alt=""  width="20%" style="border-radius: 200px; position:absolute; left: 5%;">

                <p>{!! App\Models\User::findOrFail(1)->about !!}</p>
            </div>
        </div>
    </div>
</main>
