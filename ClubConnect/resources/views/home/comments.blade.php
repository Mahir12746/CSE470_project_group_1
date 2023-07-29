<section class="artists-section section-padding" id="section_5">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-12 text-center">
                <h2 class="mb-4">Comments</h1>                    
                    <form action="{{url('add_comment')}}" method="POST">
                        @csrf
                        <textarea placeholder="Comment Here" name= 'comment' style="width: 1000px; height: 200px;"></textarea>
                        <br>
                        <input type="submit" class="btn btn-primary" value="Comment">
                    </form>
                    
            </div>

            <div>
                <h1 style="font-size:20px; padding-bottom: 20px;">All Comments</h1>

            </div>

            @foreach($comment as $comment)

            <div>
                <b>{{$comment->name}}</b>
                <p>{{$comment->comment}}</p>
                <a style="color:blue;" href="javascript::void(0);" onclick="reply(this)" data-Commentid="{{$comment->id}}">Reply</a>

                @foreach($reply as $rep)
                @if($rep->comment_id==$comment->id)
                <div style="padding-left: 3%; padding-bottom: 10px; padding-bottom: 10px;">
                    <b>{{$rep->name}}</b>
                    <p>{{$rep->reply}}</p>
                    <a style="color:blue;" href="javascript::void(0);" onclick="reply(this)" data-Commentid="{{$comment->id}}">Reply</a>
                </div>
                @endif
                @endforeach
            </div>

            @endforeach

            {{-- Reply Textbox --}}
            <div style="display:none;" class="replyDiv">
                <form action="{{url('add_reply')}}" method="POST">
                    @csrf
                    <input type="text" id="commentId" name="commentId" hidden="">
                    <textarea placeholder="write something here" style="width: 500px; height: 100px;" name="reply"></textarea>
                    <br>
                    <button type="submit" class="btn btn-warning">Reply</button>
                    <a href="javascript::void(0);" class="btn" onClick="reply_close(this)">Close</a>
                </form>
            </div>

            


        </div>
    </div>


    <script type="text/javascript">
        function reply(caller)
        {
            document.getElementById('commentId').value=$(caller).attr('data-Commentid');
            $('.replyDiv').insertAfter($(caller));
            $('.replyDiv').show();
        }

        function reply_close(caller)
        {
            $('.replyDiv').hide();
        }

    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>
</section>