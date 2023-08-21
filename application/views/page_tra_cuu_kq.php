<div class="container bg-white pb-3">
    <div class="row pt-3">
        <div class="col-md-9">

            <div class="row mainlayout-content">
                <div class="col-lg-12">
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6" id="form-timkiem">
                                <form method="post" autocomplete="off" action="#" novalidate="novalidate">
                                    <div class="row" style="margin-top:0px">
                                        <div class="col-12">
                                            <h4 class="box-form-timkiem-title" style="text-align: center;">
                                                TRA CỨU KẾT QUẢ
                                            </h4>
                                        </div>
                                        <div class="col-12" style="margin-top:10px">
                                            <div class="input-group" style="position: relative; margin-bottom: 0; flex: 1 1 auto">
                                                <input type="text" class="form-control" id="txt_sdt" autofocus="" placeholder="Nhập số điện thoại đăng ký thi" maxlength="12" id="sdt" name="sodienthoai" value="">
                                            </div>
                                        </div>
                                        <div class="col-12" style="margin-top:20px;">
                                            <div class="text-center">
                                                <input style="max-width: 280px!important;margin: 0 auto;" class="btn btn-primary btn-block btn-flat" type="button" id="btnTraCuu" value="Tra cứu" onclick="fetchData()">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </div>
                </div>
            </div>
        <div id="dataDisplay"></div>
        

        </div>
        <div class="col-md-3">
            <?php $this->view('menu_phai'); ?>
        </div>
    </div>
</div>

<script>
        function fetchData() {
            $.ajax({
                url: "tracuu",
                method: "GET",
                dataType: "json",
                data: {sdt:$('#txt_sdt').val()},
                success: function (data) {
                    displayData(data);
                },
                error: function () {
                    alert("Không có thông tin");
                }
            });
        }

        function displayData(data) {
            var tableHTML = "<table><thead><tr><th>ID</th><th>Name</th><th>Email</th></tr></thead><tbody>";

            for (var i = 0; i < data.length; i++) {
                tableHTML += "<tr><td>" + data[i].id + "</td><td>" + data[i].name + "</td><td>" + data[i].email + "</td></tr>";
            }

            tableHTML += "</tbody></table>";

            $("#dataDisplay").html(tableHTML);
        }
    </script>