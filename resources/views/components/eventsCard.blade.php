<div class="productexample-1 productcard" >
    <div class="productwrapper" >
        <center>
            <div style="padding: auto;">
                <img src="//placehold.it/280x200?text=Spons" style="margin: 4em 2em; width: auto;" >
            </div>
        </center>
        <div class="productdata">
            <div class="prodictcontent"  style="background-color: #0E8C7F;">
                @isset($event)
                    <h1 class="producttitle">
                        <a href="/eventdetail">{{$event->name}}</a>
                    </h1>
                    <p class="producttext" style="color: white;">{{$event->description}}</p>
                @endisset
                @isset($company)
                    <h1 class="producttitle">
                        <a href="/eventdetail">{{$company->name}}</a>
                    </h1>
                    <p class="producttext" style="color: white;">{{$company->company['description']}}</p>
                @endisset
            </div>
        </div>
    </div>
</div>
