<div class="modal fade createUser" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLongTitle">Create new user</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="/register" method="post" id="createUserForm">
                    @csrf
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">Name:</label>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" name="name" id="name">
                            </div>
                            <div class="form-group">
                                <input type="text" name="email" id="email">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="password">Password:</label>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Repeat Password:</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="password" name="password" id="password">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password_confirmation" id="password_confirmation">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" id="btnCreateUser">Create</button>
                </form>
            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>