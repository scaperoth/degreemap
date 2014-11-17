<style>
    /*/
    /* gridster
    /*/

    .gridster ul {
        background-color: #EFEFEF;
        width:100%;
    }

    .gridster li {
        font-size: 1em;
        font-weight: bold;
        text-align: center;
        line-height: 100%;
    }


    .gridster {
        margin: 0 auto;

        opacity: .8;

        -webkit-transition: opacity .6s;
        -moz-transition: opacity .6s;
        -o-transition: opacity .6s;
        -ms-transition: opacity .6s;
        transition: opacity .6s;
    }

    .gridster .gs-w {
        background: #DDD;
        cursor: pointer;
    }

    .gridster .player {
        background: #BBB;
    }


    .gridster .preview-holder {
        border: none!important;
        background: red!important;
    }
</style>

<div class="row">
    <div class="medium-10 columns medium-centered">
        <div class="gridster">
            <ul>
                <li data-row="1" data-col="1" data-sizex="1" data-sizey="1">a</li>
                <li data-row="2" data-col="1" data-sizex="1" data-sizey="1">b</li>
                <li data-row="3" data-col="1" data-sizex="1" data-sizey="1">c</li>

                <li data-row="1" data-col="2" data-sizex="2" data-sizey="1">d</li>
                <li data-row="2" data-col="2" data-sizex="2" data-sizey="2">e</li>

                <li data-row="1" data-col="4" data-sizex="1" data-sizey="1">f</li>
                <li data-row="2" data-col="4" data-sizex="2" data-sizey="1"></li>
                <li data-row="3" data-col="4" data-sizex="1" data-sizey="1"></li>

                <li data-row="1" data-col="5" data-sizex="1" data-sizey="1"></li>
                <li data-row="3" data-col="5" data-sizex="1" data-sizey="1"></li>

                <li data-row="1" data-col="6" data-sizex="1" data-sizey="1"></li>
                <li data-row="2" data-col="6" data-sizex="1" data-sizey="2"></li>
            </ul>
        </div>
    </div>
</div>