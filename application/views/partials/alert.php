<style>
    .alert-container {
        font-family: helvetica, arial;
        font-style: normal;
        font-stretch: normal;
        line-height: normal;
        letter-spacing: normal;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        font-smoothing: antialiased;
        text-rendering: optimizeLegibility;
        -moz-border-radius: 4px;
        -webkit-border-radius: 4px;
        -ms-border-radius: 4px;
        border-radius: 4px;
        background-color: #000000;
        color: #f8f8f8;
        border: 1px solid #000000;
        position: fixed;
        bottom: 5px;
        left: 2%;
        width: 50%;
        margin: 0 25% 0 25%;
        z-index: 10;
    }
    .alert-container .alert {
        text-align: center;
        padding: 17px 0 20px 0;
        margin: 0 25% 0 25%;
        height: 54px;
        font-size: 20px;
    }
</style>
<div class="alert-container">
    <div class="alert" id="alert-message"></div>
</div>