<div class="productexample-1 productcard" >
    <div class="productwrapper" >
        <center>
            <div style="padding: auto;">
                @isset($event)
                    <img src="{{ asset('img/images/activities.svg') }}" style="margin: 4em 2em; width: 240px;" >
                @endisset
                @isset($company)
                    <img src="{{ asset('img/images/business.svg') }}" style="margin: 4em 2em; width: 240px;" >
                @endisset
            </div>
        </center>
        <div class="productdata">
            <div class="prodictcontent"  style="background-color: #3f3d56;">
                @isset($event)
                    <h1 class="producttitle">
                        <a href="{{ route('eventDetailPage', $event->id) }}">{{$event->name}}</a>
                    </h1>
                    <h4 class="producttext" style="color: white;">{{$event->user->name}}</h4>
                @endisset
                @isset($company)
                    <h1 class="producttitle">
                        <a href="{{ route('companyDetailPage', $company->id) }}">{{$company->name}}</a>
                    </h1>
                    <h4 class="producttext" style="color: white;">{{$company->company->address}}</h4>
                @endisset
            </div>
        </div>
    </div>
</div>
