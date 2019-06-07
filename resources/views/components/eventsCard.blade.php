<div class="productexample-1 productcard" >
    <div class="productwrapper" >
        <center>
            <div style="padding: auto;">
                <img src="{{ asset('img/images/image.svg') }}" style="margin: 4em 2em; width: 240px;" >
            </div>
        </center>
        <div class="productdata">
            <div class="prodictcontent"  style="background-color: #3f3d56;">
                @isset($event)
                    <h1 class="producttitle">
                        <a href="{{ route('eventDetailPage', $event->id) }}">{{$event->name}}</a>
                    </h1>
                    <p class="producttext" style="color: white;">{{$event->description}}</p>
                @endisset
                @isset($company)
                    <h1 class="producttitle">
                        <a href="{{ route('companyDetailPage', $company->id) }}">{{$company->name}}</a>
                    </h1>
                    <p class="producttext" style="color: white;">{{$company->company['description']}}</p>
                @endisset
            </div>
        </div>
    </div>
</div>
