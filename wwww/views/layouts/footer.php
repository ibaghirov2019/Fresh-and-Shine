    <div class="page-buffer"></div>
</div>

<footer id="footer" class="page-footer"><!--Footer-->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div id="footer-phone">
        <h4>Support service</h4>
        <h3>(+994 12) 437 32 35</h3>
        <p>
            Working hours:<br />
            Weekdays: from 7am to 11pm<br />
            Saturday, Sunday - the weekend
        </p>
        <p>
            © 2017 Cleaning Services. All rights reserved.
        </p>
    </div>
                <p class="pull-right">Software Project Team #12</p>
            </div>
        </div>
    </div>
</footer><!--/Footer-->




<script>
    $(document).ready(function(){
        $(".add-to-cart").click(function () {
            var id = $(this).attr("data-id");
            $.post("/cart/addAjax/"+id, {}, function (data) {
                $("#cart-count").html(data);
            });
            return false;
        });
    });
</script>

</body>
</html>