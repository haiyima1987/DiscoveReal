{{--modal--}}
<div class="modal fade" id="userInfo"
     tabindex="-1" role="dialog"
     aria-labelledby="favoritesModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body clearfix">
                <div class="col-sm-3">
                    <img class="img-circle img-responsive" id="userImg" src="">
                </div>
                <div class="col-sm-5">
                    <p id="userName">username</p>
                    <p id="userRole">role</p>
                    <p id="userYear">year</p>
                    <p id="userCount">count</p>
                </div>
                <div class="col-sm-4">
                    <p id="userBday"><i class="fa fa-gift"></i> birthday</p>
                    <p id="userLocation"><i class="fa fa-map-marker"></i> location</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button"
                        class="btn btn-default pull-left"
                        data-dismiss="modal">Close
                </button>
                <a href="#"
                   id="userMsg"
                   class="btn btn-success pull-right">Message Author
                </a>
            </div>
        </div>
    </div>
</div>