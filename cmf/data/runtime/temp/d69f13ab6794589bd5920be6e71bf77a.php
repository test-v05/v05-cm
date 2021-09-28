<?php /*a:2:{s:54:"themes/admin_simpleboot3/admin\qyq\get_qyq_cydata.html";i:1631599397;s:86:"E:\phpstudy_pro\WWW\a05\v05-cm\cmf\public/themes/admin_simpleboot3/public\headers.html";i:1626417429;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <!-- Set render engine for 360 browser -->
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- HTML5 shim for IE8 support of HTML5 elements -->
    <!--[if lt IE 9]>

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->
    <link href="/themes/admin_simpleboot3/public/assets/themes/<?php echo cmf_get_admin_style(); ?>/bootstrap.min.css" rel="stylesheet">
    <link href="/themes/admin_simpleboot3/public/assets/simpleboot3/css/simplebootadmin.css" rel="stylesheet">
    <link href="/static/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="/static/layui/css/layui.css" rel="stylesheet" type="text/css">
    <link href="/static/css/jedate.css" rel="stylesheet" type="text/css">
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        form .input-order {
            margin-bottom: 0px;
            padding: 0 2px;
            width: 42px;
            font-size: 12px;
        }

        form .input-order:focus {
            outline: none;
        }

        .table-actions {
            margin-top: 5px;
            margin-bottom: 5px;
            padding: 0px;
        }

        .table-list {
            margin-bottom: 0px;
        }

        .form-required {
            color: red;
        }
    </style>
    <?php $_app=app()->http->getName(); ?>
    <script type="text/javascript">
        //全局变量
        var GV = {
            ROOT: "/",
            WEB_ROOT: "/",
            JS_ROOT: "static/js/",
            APP: '<?php echo $_app; ?>'/*当前应用名*/
        };
    </script>
    <script src="/themes/admin_simpleboot3/public/assets/js/jquery-1.10.2.min.js"></script>
    <script src="/static/js/wind.js"></script>
    <script src="/themes/admin_simpleboot3/public/assets/js/bootstrap.min.js"></script>
    <script src="/static/js/layer/layer.js"></script>
    <script src="/static/js/laypage/laypage.js"></script>
    <script src="/static/js/laytpl/laytpl.js"></script>
    <script src="/static/js/echarts/echarts.min.js"></script>
    <script src="/static/js/jedate.js"></script>
    <script src="/static/js/vue.js"></script>
    <script src="/static/js/axios.min.js"></script>
    <script>
        Wind.css('artDialog');
        Wind.css('layer');
        $(function () {
            $("[data-toggle='tooltip']").tooltip({
                container:'body',
                html:true,
            });
            $("li.dropdown").hover(function () {
                $(this).addClass("open");
            }, function () {
                $(this).removeClass("open");
            });
        });
    </script>
    <?php if(APP_DEBUG): ?>
        <style>
            #think_page_trace_open {
                z-index: 9999;
            }
        </style>
    <?php endif; ?>

<style>
    .ibox-content {
        background-color: #fff;
        color: inherit;
        padding: 15px 20px 200px;
        border-color: #e7eaec;
        -webkit-border-image: none;
        -o-border-image: none;
        border-image: none;
        border-style: solid solid none;
        border-width: 1px 0;
    }
</style>
<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight" id="qyqDetail">
    <!-- Panel Other -->
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>亲友圈资料</h5>
        </div>
        <div class="ibox-content">
            <!--搜索框开始-->
            <div class="row">
                <div class="col-sm-12">
                    <form name="admin_list_sea" class="form-search" method="post">
                        <div class="col-sm-3">
                            <div class="input-group">
                            <span class="input-group-btn" id="dateShowBtn" >
                                    <input type="text" name="start_time" id="dateSelectorTwo" lay-verify="date" placeholder="开始时间" autocomplete="off"
                                           class="form-control jeinput" v-model="dates">
                            </span>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <input type="text" v-model="groupId" class="form-control" placeholder="输入需查询的亲友圈ID" />
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-primary" @click="seach()"><i class="fa fa-search"></i> 搜索</button>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-success" @click="execl_info()">导出数据</button>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-sm-12" style="margin: 50px;" >
                    <div class="col-sm-2" v-for="item in userList">
                       <button v-if="item.selfZjsCount>0 || item.selfDyjCount>0" class="btn btn-info" style="width: 80%;" @click="seachs(item.userId)">{{item.userId}}</button>
                    </div>
                </div>
<!--                <div class="col-sm-12">-->
<!--                        <div class="col-sm-3">-->
<!--                            <div class="input-group">-->
<!--                                <input type="text" v-model="userId" class="form-control" placeholder="输入需查询的玩家ID" />-->
<!--                                <span class="input-group-btn">-->
<!--                                    <button type="button" class="btn btn-primary" @click="seach_userId()"><i class="fa fa-search"></i> 搜索</button>-->
<!--                                </span>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                </div>-->
            </div>
            <!--搜索框结束-->
            <div class="hr-line-dashed"></div>
            <div class="example-wrap">
                <div class="example">
                    <div class="row" style="height: 100px;padding: 20px;margin: 20px;">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>玩家ID</th>
                                    <th>亲友圈</th>
                                    <th>日期</th>
                                    <th>赢局数</th>
                                    <th>赢分</th>
                                    <th>输局数</th>
                                    <th>输分</th>
                                    <th>总局数</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr >
                                    <td>{{userId}}</td>
                                    <td>{{groupId}}</td>
                                    <td>{{dates}}</td>
                                    <td>{{contList.win_js}}</td>
                                    <td>{{contList.win_credit}}</td>
                                    <td>{{contList.lose_js}}</td>
                                    <td>{{contList.lose_credit}}</td>
                                    <td>{{contList.cont_zjs}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row" style="height: 400px;padding: 20px;margin: 20px;">
                        <div class="col-sm-6">
                            <table class="table table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th>玩法</th>
                                    <th>回放码</th>
                                    <th>房间号</th>
                                    <th>对手id</th>
                                    <th>对手昵称</th>
                                    <th>赢分</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="item in listWin">
                                    <td>{{item.playType}}</td>
                                    <td>{{item.logId}}</td>
                                    <td>{{item.tableId}}</td>
                                    <td>{{item.userId}}</td>
                                    <td>{{item.name}}</td>
                                    <td>{{item.winLoseCredit}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-sm-6">
                            <table class="table table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th>玩法</th>
                                    <th>回放码</th>
                                    <th>房间号</th>
                                    <th>对手id</th>
                                    <th>对手昵称</th>
                                    <th>输分</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="item in listShu">
                                    <td>{{item.playType}}</td>
                                    <td>{{item.logId}}</td>
                                    <td>{{item.tableId}}</td>
                                    <td>{{item.userId}}</td>
                                    <td>{{item.name}}</td>
                                    <td>{{item.winLoseCredit}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
            </div>
        </div>
        <!-- End Example Pagination -->
    </div>
</div>
</div>
<!-- End Panel Other -->
</div>
<script type="text/javascript">
    var app = new Vue({
        el: '#qyqDetail',
        data: {
            groupId: '',
            dates: '',
            userList: [],
            contList:
                {
                    "lose_credit": "111",
                    "win_credit": "111",
                    "cont_zjs": "",
                    "lose_js": "111",
                    "win_js": "111"
                },
            listWin: [],
            listShu: [],
            userId: '',
        },
        created () {
           this.addDate();
        },
        methods: {
            addDate(){
                const nowDate = new Date();
                const date = {
                    year: nowDate.getFullYear(),
                    month: nowDate.getMonth() + 1,
                    date: nowDate.getDate(),
                }
                const newmonth = date.month>10?date.month:'0'+date.month
                const day = date.date>=10?date.date:'0'+date.date
                this.dates = date.year + '-' + newmonth + '-' + day

            },
            seach () {
                let vm = this;
                let groupId = vm.groupId;
                let dates = $('#dateSelectorTwo').val();
                if(!groupId){
                    layer.msg("请填写亲友圈id!");
                    return;
                }
                axios
                    .post('/api/qyq/getgid_by_userList',{groupId: groupId,dates:dates})
                    .then(function (response) {
                       if(response.data.code==1) {
                            vm.userList = response.data.userList;
                       }else{
                           layer.msg(response.data.message);
                       }
                    })
                    .catch(function (error) { // 请求失败处理
                        console.log(error);
                    });
            },
            seachs(i) {
                let vm = this;
                let userId = i;
                let dates = $('#dateSelectorTwo').val();
                let groupId = vm.groupId;
                vm.userId = i;
                if(!groupId){
                    layer.msg("请填写亲友圈id!");
                    return;
                }
                if(!userId){
                    layer.msg("请填写玩家id!");
                    return;
                }
                axios
                    .post('/api/qyq/get_guid_by_List',{groupId: groupId,userId:userId,dates:dates})
                    .then(function (response) {
                         console.log(response);
                        if(response.data.code==1) {
                            vm.contList = response.data.cont_list;
                            vm.listWin = response.data.list;
                            vm.listShu = response.data.list1;
                        }else{
                            layer.msg(response.data.message);
                        }
                    })
                    .catch(function (error) { // 请求失败处理
                        console.log(error);
                    });

            },
            seach_userId () {
                let vm = this;
                let userId = vm.userId;
                vm.seachs(userId);
            },
            execl_info() {
                let vm = this;
                let groupId = vm.groupId;
                let dates = $('#dateSelectorTwo').val();
                location.href = "./execl_info.html?dates="+dates+"&groupId="+groupId;
            }
        },
        mounted:function(){
        }
    })
    jeDate("#dateSelectorTwo",{
        theme:{bgcolor:"#1ab394",pnColor:"#00CCFF"},
        format: "YYYY-MM-DD"
    });
</script>
</body>
</html>
