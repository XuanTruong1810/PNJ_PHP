<div class="checkout-cart">
    <div class="back-home">
        <a href="../../Home/index/">
            <button><i class="fa-solid fa-caret-left"></i> Tiếp tục mua hàng</button>
        </a>
    </div>
    <div class="info-cart">
        <div class="cart-left">
            <h3>THÔNG TIN GIỎ HÀNG</h3>
            <?php if (!$data['Cart']) : ?>
                <h1 style="font-size: 1.6rem; text-align: center;">Không có sản phẩm trong giỏ hàng</h1>
            <?php else : ?>
                <?php foreach ($data['Cart'] as $item) : ?>
                    <div class="item">
                        <div class="img">
                            <img src="../Public/Image/Products/<?php echo $item['IMAGE_1']; ?>" alt="">
                        </div>
                        <div class="info">
                            <div>
                                <h6><?php echo $item['PRODUCTNAME']; ?></h6>
                                <h6>Mã: <?php echo strtoupper($item['PRODUCTSIZE']); ?></h6>
                            </div>
                            <div class="form">
                                <div>
                                    <p>Giá</p>
                                    <p><?php echo number_format($item['PRICE']); ?>đ</p>
                                </div>
                                <div>
                                    <div>
                                        <p>Kích cỡ</p>
                                    </div>
                                    <div>
                                        <select name="size" id="size">
                                            <option aria-readonly="true" value="<?php echo $item['SizeName']; ?>"><?php echo $item['SizeName']; ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    <p>Số lượng</p>
                                    <input type="number" name="quantity" min="1" id="quantity" value="<?php echo $item['QUANTITY'] ?>">
                                </div>
                            </div>
                            <div>
                                <form action="../DeleteCart/" method="post">
                                    <input hidden type="text" name="valueDelete" value="<?php echo $item['PRODUCTSIZE']; ?>">
                                    <button type="submit">
                                        <p style="margin: auto 0;"><i class="fa-solid fa-trash"></i> Xóa</p>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            <div>
                <div class="pay_temp">
                    <div class="pay">
                        <p>Chi phí vận chuyển</p>
                        <p style="font-weight: bold;">Miễn phí</p>
                    </div>
                </div>
                <div class="pay" style="margin-top: 10px;">
                    <p style="font-weight: bold;">Thành tiền</p>
                    <p style="color: red; font-weight: bold;">2.132.000đ</p>
                </div>
            </div>
        </div>
        <div class="cart-right">
            <div class="stepper-wrapper" style="z-index: 0;">
                <div class="stepper-item completed">
                    <div class="step-counter"><i class="fa-solid fa-check"></i></div>
                    <div class="step-name">Thông tin người mua</div>
                </div>
                <div class="stepper-item completed">
                    <div class="step-counter"><i class="fa-solid fa-check"></i></div>
                    <div class="step-name">Hình thức nhận hàng</div>
                </div>
                <div class="stepper-item active">
                    <div class="step-counter"><i class="fa-solid fa-check"></i></div>
                    <div class="step-name">Đặt hàng</div>
                </div>
                <div class="stepper-item">
                    <div class="step-counter"><i class="fa-solid fa-check"></i></div>
                    <div class="step-name">Thanh toán</div>
                </div>
            </div>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
            <div>
                <div class="infoUser cart-right-form">
                    <p>1</p>
                    <p>Thông tin người mua</p>
                </div>
                <div data-toggle="collapse" data-target="#collapse_info" type="button" id="update">
                    <div>
                        <p>Chỉnh Sửa</p>
                    </div>
                </div>
                <div id="collapse_info" class="collapse">
                    <div class="input-info row">
                        <div class="col-sm-6"><input type="text" id="CUSTOMERNAME" value="<?php echo ($data['Customer']['CUSTOMERNAME']) ?>" placeholder="Họ tên(Bắt buộc)"></div>
                        <div class="col-sm-6"><input type="text" id="PHONENUMBER" value="<?php echo ($data['Customer']['PHONENUMBER']) ?>" placeholder="SĐT (bắt buộc)"></div>
                        <div class="col-sm-6"><input type="text" id="Email" value="<?php echo ($data['Customer']['EMAIL']) ?>" placeholder="Email"></div>
                    </div>
                    <div class="continue">
                        <button class="continueBtn">Tiếp tục</button>
                    </div>
                </div>
                <div class="form-of-receipt cart-right-form">
                    <p>2</p>
                    <p>Hình thức nhận hàng</p>
                </div>
                <div style="display: flex; justify-content: space-between;">
                    <button data-style="2" id="shipping" style="width: 50%; background-color: blue;">Giao hàng tận nơi</button>
                    <button data-style="1" id="shop" style="width: 50%;">Nhận tại cửa hàng</button>
                </div>
                <div style="display: none;" class="shop"></div>
                <div style="display: block;" class="shipping">
                    <div class="input-info row">
                        <div class="col-sm-6">
                            <select name="province" id="province">
                                <option value="" selected>Chọn Tỉnh/Thành phố</option>

                            </select>
                        </div>
                        <div class="col-sm-6">
                            <select name="city" id="city">
                                <option value="" selected>Chọn Quận/Huyện</option>

                            </select>
                        </div>
                        <div class="col-sm-6">
                            <select name="wards" id="wards">
                                <option value="" selected>Chọn Phường/Xã</option>

                            </select>
                        </div>
                        <div class="col-sm-6">
                            <input type="text" name="road" id="road" placeholder="Số nhà, Tên đường">
                        </div>
                    </div>
                </div>
                <div>
                    <ul class="checkbox-list">
                        <li>
                            <input type="checkbox" id="checkbox2" name="checkbox2">
                            <label for="checkbox2">Tôi đồng ý cho cửa hàng thu thập, xử lý dữ liệu cá nhân của tôi theo quy định tại Thông báo này và theo quy định của pháp luật.</label>
                        </li>
                    </ul>
                </div>
                <div style="text-align: center;">
                    <button id="createOrder">Đặt hàng</button>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    #update {
        display: flex;
        justify-content: flex-end;
        margin-bottom: 10px;
        margin-top: -5px;
    }

    #update div {
        background-color: white;
        border-radius: 8px;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        text-align: center;
        padding: 5px 8px;
    }

    #update div p {
        margin: 0;
        font-size: 1rem;
        font-weight: bold;
    }
</style>
<script>
    const update = document.querySelector("#update");
    update.addEventListener('click', () => {
        const collapse = document.getElementsByClassName("collapse in");
        console.log(collapse);
        if (collapse) {
            update.style.visibility = "hidden";
        }
    })
    document.querySelector(".continueBtn").addEventListener('click', () => {
        // Call api cập nhật or thêm người dùng
        const collapse = document.querySelector(".collapse");
        collapse.classList.remove("in");
        update.style.visibility = "visible";

    })
</script>
<script>
    let shipping = 2;
    document.querySelector("#shop").addEventListener("click", () => {
        document.querySelector('.shop').style.display = "block";
        document.querySelector('.shipping').style.display = "none";
        document.querySelector('#shop').style.backgroundColor = "blue";
        document.querySelector('#shipping').style.backgroundColor = "";
        shipping = 1;

    });
    document.querySelector("#shipping").addEventListener("click", () => {
        document.querySelector('.shipping').style.display = "block";
        document.querySelector('.shop').style.display = "none";
        document.querySelector('#shipping').style.backgroundColor = "blue";
        document.querySelector('#shop').style.backgroundColor = "";
        shipping = 2;





    });
</script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script>
    const provinces = $("#province");
    const cities = $("#city");
    $.ajax({
        type: "GET",
        url: "https://api.mysupership.vn/v1/partner/areas/province",
        success: function(response) {

            $.each(response.results, function(index, province) {
                provinces.append(`<option data-name="${province.name}" value="${province.code}">${province.name}</option>`);
            });
        },
        error: function(xhr, status, error) {
            console.error("Error:", error);
        }
    });
    provinces.change(function(e) {
        var selectedProvinceId = $(this).val();
        console.log(this);
        if (selectedProvinceId) {
            $.ajax({
                type: "GET",
                url: "https://api.mysupership.vn/v1/partner/areas/district?province=" + selectedProvinceId,
                success: function(response) {

                    cities.empty();
                    $.each(response.results, function(index, city) {
                        cities.append(`<option data-name="${city.name}" value="${city.code}">${city.name}</option>`);
                    });
                },
                error: function(xhr, status, error) {
                    console.error("Error:", error);
                }
            });
        }

    });

    cities.change(function() {
        var selectedCityId = $(this).val();
        if (selectedCityId) {
            $.ajax({
                type: "GET",
                url: "https://api.mysupership.vn/v1/partner/areas/commune?district=" + selectedCityId,
                success: function(response) {
                    const wards = $("#wards");
                    wards.empty();
                    $.each(response.results, function(index, ward) {
                        wards.append(`<option data-name="${ward.name}"  value="${ward.code}">${ward.name}</option>`);
                    });
                },
                error: function(xhr, status, error) {
                    console.error("Error:", error);
                }
            });
        }
    });
</script>
<script>
    function getCookie(name) {
        let cookieArr = document.cookie.split(";");

        for (let i = 0; i < cookieArr.length; i++) {
            let cookiePair = cookieArr[i].split("=");

            if (name == cookiePair[0].trim()) {
                return decodeURIComponent(cookiePair[1]);
            }
        }
        return null;
    }
    document.getElementById("createOrder").addEventListener('click', () => {

        let data = {};
        let fullAddress;
        const token = getCookie('AuthenticationUser');

        const username = $("#CUSTOMERNAME").val();
        const phoneNumber = $("#PHONENUMBER").val();
        const email = $("#Email").val();
        data = {
            CUSTOMERNAME: username,
            PHONENUMBER: phoneNumber,
            EMAIL: email,
        };
        data.SHIPPINGMETHOD = shipping;
        if (shipping === 1) {
            data.ADDRESS = null;
        } else {
            const province = $("#province option:selected").data('name');
            const city = $("#city option:selected").data('name');
            const ward = $("#wards option:selected").data('name');
            const road = $("#road").val();
            fullAddress = `${road} - ${ward} - ${city} - ${province}`;
            data.ADDRESS = fullAddress;
        }

        $.ajax({
            type: "POST",
            url: "http://localhost:8080/PNJSHOP/CreateOrder/CreateOrderAPI/",
            data: JSON.stringify({
                ORDER: data
            }),
            dataType: "json",
            contentType: "application/json;charset=UTF-8",
            success: function(response) {
                if (response.status === 200) {
                    window.location.href = `/PNJSHOP/Payment/index/${response.OrderID}`
                }
            },
            error: function(xhr, status, error) {
                console.error("Đã xảy ra lỗi khi gửi yêu cầu tạo đơn hàng:", error);
                console.log("Trạng thái lỗi:", status);
                console.log("Thông tin lỗi:", xhr.responseText);
            }
        });


    })
</script>
<script>

</script>