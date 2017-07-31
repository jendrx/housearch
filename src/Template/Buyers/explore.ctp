<?php
/**
 * Created by PhpStorm.
 * User: rom
 * Date: 7/25/17
 * Time: 9:56 AM
 */?>

<div class="row">
    <div id="col_content" class="large-12 columns info_content">
        <div class="row">
            <div id="voteBox">
                <ul id="voteList" >
                    <li style="float: left; display:inline-block; padding:1%">
                        <div id="pano_left">
                            <a>
                                <img>
                            </a>
                        </div>

                    </li>
                    <li style="float: left;display: inline-block; padding:1%">
                        <div id="pano_right">
                            <a>
                                <img>
                            </a>

                        </div>

                    </li>

                </ul>
            </div>
        </div>
    </div>
</div>


<script>

    var left_done = false;
    var right_done = false;
    var current_match;

    var poll = function poll() {
        var buyer;
        var current_match;
        var poll;

        return{
            setPoll : function(poll)
            {
                this.poll = poll;
            },
            getPoll : function()
            {
                return this.poll;
            },
            setBuyer : function(buyer)
            {
                this.buyer = buyer;
            },
            getBuyer : function()
            {
                return this.buyer;
            },
            setMatch : function(match)
            {
                this.current_match = match;
            },
            getMatch : function(match)
            {
                return this.current_match;
            }
        }
    }

    function getStreetViewURL(lat,lon,width,height,callback) {
        if (width == null || height == null)
        {
            width  = 470;
            height = 300;
        }
        var apiKey = 'AIzaSyD0L7yquC0pma5kVbzh_C_d6iLpiNGJwHE';
        var url = "http://maps.googleapis.com/maps/api/streetview?size="+ width + "x" + height + "&location=" + lat + "," + lon + "&sensor=false";

        $.get(url, function(data, textStatus, jqXHR) {
            console.log("fetched without api key");
            callback(url);
        }).fail(function(jqXHR, textStatus, errorThrown) {
            url += "&key=" + apiKey;
            $.get(url, function(data, textStatus, jqXHR) {
                console.log("fetched with api key");
                callback(url);
            });
        });

    }

    function onChoice(poll_id,match_id,choice) {

        left_done = false;
        right_done = false;
        $('#pano_left img').unbind("click");
        $('#pano_right img').unbind("click");

        $.ajax(
            {
                type: 'post',
                url: '/Polls/vote',
                dataType: 'json',
                data: {
                    'match_id' : match_id,
                    'winner'   : choice
                },
                success : function(data)
                {
                    getNext(poll_id);
                }
            });

    }

    function loadingDone() {

        //$("img.place").unbind('click');
        //var match_id = current_match.match_id;
        $('#pano_left img').on("click", function() { onChoice(current_match.poll_id,current_match.match_id,current_match.optOne.id); });
        $('#pano_right img').on("click", function() { onChoice(current_match.poll_id,current_match.match_id,current_match.optTwo.id); });

        //$('.loadingmsg').css("display","none");
        //$("ul.votelist").css("opacity", 1.0);


    }

    function getNext(poll_id,callback) {
        $.ajax(
            {
                type: 'get',
                url: '/Polls/getNext',
                dataType: 'json',
                data:{
                    'poll_id' : poll_id
                },
                success : function(data)
                {
                    //callback(data);

                    /// Smells bad
                    if(data.done !== true)
                    {
                        current_match = data.pair;
                        getStreetViewURL(data.pair.optOne.lat,data.pair.optOne.lon,null,null,function(url)
                        {
                            left_done = true;
                            $("#pano_left img").attr('src',url);
                            if(right_done)
                                loadingDone();
                        });

                        getStreetViewURL(data.pair.optTwo.lat,data.pair.optTwo.lon,null,null,function(url){
                            right_done = true;
                            $("#pano_right img").attr('src',url);
                            if(left_done)
                                loadingDone();
                        });
                    }
                    else
                    {

                        $('#voteBox').hide();
                        getRank(poll_id,showRank);
                    }

                }
            });

    }

    function getRank(poll_id,callback) {
        $.ajax(
            {
                type: 'get',
                url: '/Polls/getRank',
                dataType: 'json',
                data: {
                    'poll_id' : poll_id
                },
                success : function(response)
                {
                    callback(response.rank);
                }
            });
    }

    function showRank(data)
    {
        var pics;
        $('#col_content').append('<div id="rankRow" class="row"><ul id=rankList></ul></div>');
        for(i = 0; i < data.length; i++)
        {
            getStreetViewURL(data[i].sample.lat,data[i].sample.lon,200,200, function(url)
            {
                $('#rankList').append('<li style="display:inline-block; padding:1%;"><a> <img src="'+url+'"> </a></li>');
            });
        }
    }




    $(document).ready(function () {
        var pollInfo = <?php echo $poll ?>;
        getNext(pollInfo['id']);
    });
</script>

