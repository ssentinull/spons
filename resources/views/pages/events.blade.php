@extends('components.navbar')

@section('content')
<center><div><h1 style="margin-left:5px; color: #0E8C7F;">   Event and Activities posted by Students</h1></div></center>
<div class="row justify-content-center" style="z-index:999999;">
<p style="margin-left:15px; color: #0E8C7F;">   showing 4 out of XXX</p>

<div class="product">
<div class="prodictrow">

@foreach($events as $event)
  <div class="productexample-1 productcard" >
    <div class="productwrapper" >
    <center>
    <div style="padding: auto;">
    <img src="#" style="margin: 4em 2em; width: auto;" >
    </div>
    </center>
      <div class="productdata">
        <div class="prodictcontent"  style="background-color: #0E8C7F;">
        <!-- foreach ($events as $event) -->
          <h1 class="producttitle"><a href="/eventdetail">{{$event->name}}</a></h1>
          <p class="producttext" style="color: white;">Desc</p>
        </div>
        <input type="checkbox" id="show-menu" />
      </div>
    </div>
  </div>
  @endforeach
</div>

@endsection

<style type="text/css">
  @import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,700);
* {
  box-sizing: border-box;
}

.product {
  /*background-image: linear-gradient(to right, #034378, #2d4e68);*/
  /*-webkit-font-smoothing: antialiased;*/
  /*-moz-osx-font-smoothing: grayscale;*/
  height: 100vw;
  font-family: "Open Sans", sans-serif;
}

a {
  text-decoration: none;
}

h1 {
  font-family: "Open Sans", sans-serif;
  font-weight: 300;
}

.prodictrow {
  height: auto;
  max-width: 900px;
  margin: 50px auto 2px;
}

.productcard {
  float: left;
  padding: 0 1.7rem;
  width: 50%;
}

@media screen and (max-width: 650px) {
  .productexample-1 {
    width: 100%;
    height: auto;
    display: block;
  }
}

@media screen and (max-width: 650px) {
 .productcard .productwrapper {
  background-color: #fff;
  height: 300px;
  }
}



.productcard .menu-content {
  margin: 0;
  padding: 0;
  list-style-type: none;
}
.productcard .menu-content::before, .productcard .menu-content::after {
  content: '';
  display: table;
}
.productcard .menu-content::after {
  clear: both;
}
.productcard .menu-content li {
  display: inline-block;
}
.productcard .menu-content a {
  color: #fff;
}
.productcard .menu-content span {
  position: absolute;
  left: 50%;
  top: 0;
  font-size: 10px;
  font-weight: 700;
  font-family: 'Open Sans';
  -webkit-transform: translate(-50%, 0);
          transform: translate(-50%, 0);
}
.productcard .productwrapper {
  margin-top: 1em;
  margin-bottom: 1em;
  background-color: #fff;
  min-height: 34vw;
  position: relative;
  overflow: hidden;
  box-shadow: 0 19px 38px rgba(0, 0, 0, 0.3), 0 15px 12px rgba(0, 0, 0, 0.2);
}
.productcard .productwrapper:hover .productdata {
  -webkit-transform: translateY(0);
          transform: translateY(0);
}
.productcard .productdata {
  position: absolute;
  bottom: 0;
  width: 100%;
  -webkit-transform: translateY(calc(70px + 1em));
          transform: translateY(calc(70px + 1em));
  transition: -webkit-transform 0.3s;
  transition: transform 0.3s;
  transition: transform 0.3s, -webkit-transform 0.3s;
}
.productcard .productdata .prodictcontent {
  padding: 1em;
  position: relative;
  z-index: 1;
}
.productcard .author {
  font-size: 12px;
}
.productcard .producttitle {
  margin-top: 10px;
}
.productcard .producttext {
  height: 70px;
  margin: 0;
}
.productcard input[type='checkbox'] {
  display: none;
}
.productcard input[type='checkbox']:checked + .menu-content {
  -webkit-transform: translateY(-60px);
          transform: translateY(-60px);
}

.productexample-1 .productwrapper {
  /*background: url(  assets/img/intelpay.png) 20% 1%/cover no-repeat;*/
}
.productexample-1 .productdate {
  position: absolute;
  top: 0;
  left: 0;
  background-color: #77d7b9;
  color: #fff;
  padding: 0.8em;
}
.productexample-1 .productdate span {
  display: block;
  text-align: center;
}
.productexample-1 .date .day {
  font-weight: 700;
  font-size: 24px;
  text-shadow: 2px 3px 2px rgba(0, 0, 0, 0.18);
}
.productexample-1 .date .month {
  text-transform: uppercase;
}
.productexample-1 .date .month,
.productexample-1 .date .year {
  font-size: 12px;
}
.productexample-1 .productcontent {
  background-color: #fff;
  box-shadow: 0 5px 30px 10px rgba(0, 0, 0, 0.3);
}
.productexample-1 .producttitle a {
  color: white;
}
.productexample-1 .menu-button {
  position: absolute;
  z-index: 999;
  top: 16px;
  right: 16px;
  width: 25px;
  text-align: center;
  cursor: pointer;
}
.productexample-1 .menu-button span {
  width: 5px;
  height: 5px;
  background-color: gray;
  color: gray;
  position: relative;
  display: inline-block;
  border-radius: 50%;
}
.productexample-1 .menu-button span::after, .productexample-1 .menu-button span::before {
  content: '';
  display: block;
  width: 5px;
  height: 5px;
  background-color: currentColor;
  position: absolute;
  border-radius: 50%;
}
.productexample-1 .menu-button span::before {
  left: -10px;
}
.productexample-1 .menu-button span::after {
  right: -10px;
}
.productexample-1 .menu-content {
  text-align: center;
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  z-index: -1;
  transition: -webkit-transform 0.3s;
  transition: transform 0.3s;
  transition: transform 0.3s, -webkit-transform 0.3s;
  -webkit-transform: translateY(0);
          transform: translateY(0);
}
.productexample-1 .menu-content li {
  width: 33.333333%;
  float: left;
  background-color: #77d7b9;
  height: 60px;
  position: relative;
}
.productexample-1 .menu-content a {
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
  font-size: 24px;
}
.productexample-1 .menu-content span {
  top: -10px;
}


</style>

{{-- <div class="container">
    <table class="table table-borderless">
       <tbody>
           @if ($events->count() > 1)
                @for ($i = 0; $i < $events->count(); $i+=2)
                    <tr>
                        <td>
                            @include('components.eventsCard', ['i' => $i])
                        </td>
                        @if ($events[$i + 1] != null)
                            <td>
                                @include('components.eventsCard', ['i' => $i + 1])
                            </td>
                        @endif
                    </tr>
                @endfor
            @elseif ($events->count() == 1)
                <tr>
                    <td>
                        @include('components.eventsCard', ['i' => 0])
                    </td>
                </tr>
            @else
                <tr>There are no events</tr>
            @endif
       </tbody>
    </table>
    <div class="row justify-content-center">
        {{ $events->links() }}
    </div>
</div> --}}
