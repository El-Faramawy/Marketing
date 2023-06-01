@extends('layouts.web.app')
@section('site_content')

<div class="wrapper">
    <form>
        <div class="searchBar">
            <input id="searchQueryInput" type="text" name="searchQueryInput" placeholder="Search" value=""/>
            <button id="searchQuerySubmit" type="submit" name="searchQuerySubmit">
                <svg style="width: 24px; height: 24px" viewBox="0 0 24 24">
                    <path
                        fill="#666666"
                        d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z"
                    />
                </svg>
            </button>
        </div>
</div>
<div class="about-text container-">
    <h1>Who we are</h1>
    <p>
        Lorem ipsum dolor sit amet consectetur, , vero voluptatum aut nulla
        consequuntur iure eaque? Dolores optio, modi fuga ipsam ex aperiam
        perspiciatis nisi? Aliquam quae, reiciendis temporibus quasi quibusdam
        ipsum totam officia voluptas deleniti ullam eius accusamus libero
        voluptate cumque nulla est delectus modi tempora. Eum voluptatibus
        officia aliquam odio alias modi assumenda debitis pariatur quis aliquid.
        Quam recusandae magnam pariatur provident numquam expedita. Excepturi
        quisquam repellendus provident placeat iusto qui? Repudiandae officiis
        sed aliquid vel ab maxime blanditiis aperiam sunt at.Lorem ipsum dolor
        sit amet consectetur, , vero voluptatum aut nulla consequuntur iure
        eaque? Dolores optio, modi fuga ipsam ex aperiam perspiciatis nisi?
        Aliquam quae, reiciendis temporibus quasi quibusdam ipsum totam officia
        voluptas deleniti ullam eius accusamus libero voluptate cumque nulla est
        delectus modi tempora. Eum voluptatibus officia aliquam odio alias modi
        assumenda debitis pariatur quis aliquid. Quam recusandae magnam pariatur
        provident numquam expedita. Excepturi quisquam repellendus provident
        placeat iusto qui? Repudiandae officiis sed aliquid vel ab maxime
        blanditiis aperiam sunt at.
    </p>
</div>
<div class="srv">
    <div class="container">
        <div class="heading">
            <h1>SERVICES</h1>
            <p>
                Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.
                Mauris blandit aliquet elit, eget tincidunt
            </p>
        </div>
        <div class="content">
            <div class="box">
                <i class="fas fa-desktop fa-3x"></i>
                <div class="text">
                    <h3>Vorem amet intuitive</h3>
                    <p>
                        Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.
                        Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.
                        Curabitur aliquet quam.
                    </p>
                </div>
            </div>
            <div class="box">
                <i class="fas fa-cog fa-3x"></i>
                <div class="text">
                    <h3>Vorem amet intuitive</h3>
                    <p>
                        Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.
                        Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.
                        Curabitur aliquet quam.
                    </p>
                </div>
            </div>
            <div class="box">
                <i class="fas fa-pencil-ruler fa-3x"></i>
                <div class="text">
                    <h3>Vorem amet intuitive</h3>
                    <p>
                        Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.
                        Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.
                        Curabitur aliquet quam.
                    </p>
                </div>
            </div>
            <div class="box">
                <i class="fas fa-camera fa-3x"></i>
                <div class="text">
                    <h3>Vorem amet intuitive</h3>
                    <p>
                        Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.
                        Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.
                        Curabitur aliquet quam.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
{{--<footer>--}}
{{--    <p>--}}
{{--        © copyright 2023, All rights reserved--}}
{{--    </p>--}}
{{--</footer>--}}
@endsection

