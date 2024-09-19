<style>
    .sidebar {
        position: fixed;
        top: 80px;
        left: 0;
        width: 15%;
        height: calc(100vh - 80px);
        overflow-y: auto;
    }
    .accordion {
        background-color: #eee;
        color: #444;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
        transition: 0.4s;
    }

    .accordion:hover {
        background-color: #ccc;
    }

    .accordion:after {
        content: '\002B';
        font-size: 13px;
        float: right;
        margin-left: 5px;
    }

    .active:after {
        content: '\2212';
    }

    .panel {
        padding: 0 18px;
        background-color: white;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.2s ease-out;
    }
</style>

<div class="sidebar">
    <button class="accordion">Dashboard</button>
    <div class="panel">
        <a class="nav-link" href="{{url('home')}}">Dashboard</a>
        <a class="nav-link" href="{{ url('transaksi') }}">Transaksi</a>
    </div>

    <button class="accordion">Profile</button>
    <div class="panel">
        <a class="nav-link" href="#">Profile</a>
        <a class="nav-link" href="#">Change Password</a>
    </div>
    <button class="accordion">MASTER</button>
    <div class="panel">
        <a class="nav-link" href="{{ url('master/users')}}">Users</a>
        <a class="nav-link" href="{{ url('master/perawatan')}}">Perawatan</a>
        <a class="nav-link" href="{{ url('master/gerai')}}">Gerai</a>
    </div>

    <button class="accordion">Settings</button>
    <div class="panel">
        <a class="nav-link" href="#">Settings</a>
        <a class="nav-link" href="#">Logout</a>
    </div>
</div>

<script>
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
            }
        });
    }
</script>

