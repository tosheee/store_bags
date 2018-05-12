<!--=========MIDDEL-TOP_BAR============-->
<div class="middleBar">
    <div class="container">
        <div class="row display-table">
            <div class="col-sm-3 vertical-align text-left hidden-xs">
                <a href="/"><img  style="margin: 0px 50px 0px 0" width="220" src="/storage/common_pictures/logo.png" alt=""></a>
            </div>
            <!-- end col -->

            <div class="col-sm-7 vertical-align text-center">
                <div id="wrap-search">
                    <form action="" autocomplete="on">
                        <input id="search" name="search" type="text" placeholder="What're we looking for ?"><input id="search_submit" value="Rechercher" type="submit">
                    </form>
                </div>
            </div>


            <!-- end col -->
            <div class="col-sm-2 vertical-align header-items hidden-xs">


                <div class="header-item mr-5">
                    <?php $allLikes = count(App\Like::all()); ?>
                    <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Wishlist"> <i class="fa fa-thumbs-o-up"></i> <sub>{{ isset($allLikes) ? $allLikes : '' }}</sub> </a>
                </div>



                <div class="header-item">
                    <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Compare"> <i class="fa fa-refresh"></i> <sub>2</sub> </a>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end  row -->
    </div>
</div>