<?php
    /**
     * Created by PhpStorm.
     * User: rom
     * Date: 6/19/17
     * Time: 2:53 PM
     */ ?>

<div class="row">
    <div id="col_content" class="large-12 columns info_content">
        <div class="row">
        </div>
    </div>
</div>


<script>



    function poll() {
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

    function fillOptions(data,start) {
        if(start === true)
        {
            $('#col_content').append('<div class="row">' +
                '<div id="radio_group" class="large-6 columns">' +
                '<label> Choose your Favorite</label>' +
                '<input type="radio" name="option" id="optOne_radio"> <label for="optOne_radio"> </label>' +
                '<input  type="radio" name="option" id="optTwo_radio"> <label for="optTwo_radio"> </label> ' +
                '</div>' +
                '</div> ' +
                '<div class="row">' +
                '<div class="large-6 columns"> ' +
                '<input id="vote_btn" type="button" class="button" value="Vote">' +
                '</div>' +
                '</div>');
        }

        var pair = data.pair;
        var optOne = $('label[for=optOne_radio]');
        var optTwo = $('label[for=optTwo_radio]');

        optOne.html(pair.optOne.id);
        $('#optOne_radio').val(pair.optOne.id);

        optTwo.html(pair.optTwo.id);
        $('#optTwo_radio').val(pair.optTwo.id);



    }

    function nextPair(poll_id, callback) {
        $.ajax(
            {
               type: 'get',
                url: '/Polls/nextPair',
                dataType: 'json',
                data:{
                   'poll_id' : poll_id
                },
                success : function(data)
                {
                    callback(data);
                }
            });
    }

    function vote(match_id,winner,callback) {
        $.ajax(
            {
                type: 'post',
                url: '/Polls/vote',
                dataType: 'json',
                data: {
                    'match_id' : match_id,
                    'winner'   : winner
                },
                success : function(data)
                {
                    callback(data);
                }
            });

    }

    function getNext(poll_id, callback) {
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
                    callback(data);
                }
            });

    }


    $(document).ready(function () {

        var pollInfo = <?php echo $poll ?>;

        var newPoll = poll();
        newPoll.setBuyer(pollInfo['buyer_id']);
        newPoll.setPoll(pollInfo['id']);

        getNext(newPoll.getPoll(), function (data) {
            newPoll.setMatch(data.pair.match_id);
            fillOptions(data, true);
        });


        $('#col_content').on("click", '#vote_btn', function () {
            var winner = $("#radio_group input[type ='radio']:checked").val();
            var match_id = newPoll.getMatch();
            vote(match_id, winner, function (data) {

            });
            getNext(newPoll.getPoll(), function (data) {
                newPoll.setMatch(data.pair.match_id);
                fillOptions(data, false);
            });
        });


    });
</script>

