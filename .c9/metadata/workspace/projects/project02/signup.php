{"filter":false,"title":"signup.php","tooltip":"/projects/project02/signup.php","ace":{"folds":[],"scrolltop":480,"scrollleft":0,"selection":{"start":{"row":44,"column":66},"end":{"row":44,"column":66},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"hash":"cd54c4d146ba39ea5c33db3c06ed8ca5a49e1673","undoManager":{"mark":100,"position":100,"stack":[[{"start":{"row":18,"column":22},"end":{"row":18,"column":23},"action":"insert","lines":["o"],"id":1113}],[{"start":{"row":18,"column":23},"end":{"row":18,"column":24},"action":"insert","lines":["r"],"id":1114}],[{"start":{"row":18,"column":24},"end":{"row":18,"column":25},"action":"insert","lines":["d"],"id":1115}],[{"start":{"row":15,"column":66},"end":{"row":15,"column":120},"action":"insert","lines":["value=\"<?php if(!empty($username)) echo $username; ?>\""],"id":1116}],[{"start":{"row":15,"column":66},"end":{"row":16,"column":0},"action":"insert","lines":["",""],"id":1117},{"start":{"row":16,"column":0},"end":{"row":16,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":16,"column":4},"end":{"row":16,"column":5},"action":"insert","lines":[" "],"id":1118}],[{"start":{"row":16,"column":5},"end":{"row":16,"column":6},"action":"insert","lines":[" "],"id":1119}],[{"start":{"row":16,"column":6},"end":{"row":16,"column":7},"action":"insert","lines":[" "],"id":1120}],[{"start":{"row":16,"column":7},"end":{"row":16,"column":8},"action":"insert","lines":[" "],"id":1121}],[{"start":{"row":2,"column":0},"end":{"row":2,"column":27},"action":"remove","lines":["require_once('header.php');"],"id":1122},{"start":{"row":2,"column":0},"end":{"row":84,"column":2},"action":"insert","lines":["    //Start the session","    require_once('startsession.php');","    ","    //Insert page header","    $page_title = 'Where opposites attract!';","    require_once('header.php');","    ","    //Implement scripts","    require_once('appvars.php');","    require_once('connectvars.php');","    ","    //Display nav menu","    require_once('navmenu.php');","    ","    //Connect to mismatchdb","    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);","    ","    ","    //The form has been submitted","    if (isset($_POST['submit'])) {","        ","        //Get the sign up vars from the form","        $username = mysqli_real_escape_string($dbc, trim($_POST['username']));","        $password1 = mysqli_real_escape_string($dbc, trim($_POST['password1']));    ","        $password2 = mysqli_real_escape_string($dbc, trim($_POST['password2']));    ","    ","    ","        //Check that form is filled completely, and passwords match","        if (!empty($username) && !empty($password1) && !empty($password2) &&","                ($password1 == $password2)) {","                    ","            //Check that username is unique by searching for it in mismatchdb","            $query = \"SELECT username FROM mismatch_user WHERE username = '$username'\";","            ","            //Run query","            $data = mysqli_query($dbc, $query);","            ","            ","            //The username is unique, insert new user data into database","            if (mysqli_num_rows($data) == 0) {","                ","                $query = \"INSERT INTO mismatch_user (username, password, join_date) VALUES \" .","                        \"('$username', SHA('$password1'), NOW())\";","            ","                //Run query","                mysqli_query($dbc, $query);","                ","                //Confirm account creation with user","                echo '<p>Your new account has been successfully created. You\\'re now ready to log in and ' . ","                        '<a href=\"editprofile.php\">edit your profile</a>.</p>';","                ","                //Close the mismatchdb","                mysqli_close($dbc);","                ","                //Exit script","                exit();","                ","                ","            //The username is not unique","            } else {","                ","                echo '<p class=\"error\">An account already exists for this username, ' . ","                        'Please try a different username.</p>';","                ","                //Clear username so they can enter a new one","                $username = \"\";","            ","            }","            ","        //Form data missing, or passwords do not match    ","        } else {","            ","            echo '<p class=\"error\">Please check that username and both passwords are ' . ","                    'entered, and that the passwords are identical</p>';","                ","        }","        ","    }","    ","    //Make sure database is closed","    mysqli_close($dbc);","            ","?>"]}],[{"start":{"row":6,"column":19},"end":{"row":6,"column":43},"action":"remove","lines":["Where opposites attract!"],"id":1123},{"start":{"row":6,"column":19},"end":{"row":6,"column":20},"action":"insert","lines":["S"]}],[{"start":{"row":6,"column":20},"end":{"row":6,"column":21},"action":"insert","lines":["i"],"id":1124}],[{"start":{"row":6,"column":21},"end":{"row":6,"column":22},"action":"insert","lines":["g"],"id":1125}],[{"start":{"row":6,"column":22},"end":{"row":6,"column":23},"action":"insert","lines":["n"],"id":1126}],[{"start":{"row":6,"column":23},"end":{"row":6,"column":24},"action":"insert","lines":[" "],"id":1127}],[{"start":{"row":6,"column":24},"end":{"row":6,"column":25},"action":"insert","lines":["U"],"id":1128}],[{"start":{"row":6,"column":25},"end":{"row":6,"column":26},"action":"insert","lines":["p"],"id":1129}],[{"start":{"row":16,"column":17},"end":{"row":16,"column":27},"action":"remove","lines":["mismatchdb"],"id":1130},{"start":{"row":16,"column":17},"end":{"row":16,"column":18},"action":"insert","lines":["e"]}],[{"start":{"row":16,"column":18},"end":{"row":16,"column":19},"action":"insert","lines":["x"],"id":1131}],[{"start":{"row":16,"column":19},"end":{"row":16,"column":20},"action":"insert","lines":["e"],"id":1132}],[{"start":{"row":16,"column":20},"end":{"row":16,"column":21},"action":"insert","lines":["r"],"id":1133}],[{"start":{"row":16,"column":21},"end":{"row":16,"column":22},"action":"insert","lines":["c"],"id":1134}],[{"start":{"row":16,"column":22},"end":{"row":16,"column":23},"action":"insert","lines":["i"],"id":1135}],[{"start":{"row":16,"column":23},"end":{"row":16,"column":24},"action":"insert","lines":["s"],"id":1136}],[{"start":{"row":16,"column":24},"end":{"row":16,"column":25},"action":"insert","lines":["e"],"id":1137}],[{"start":{"row":16,"column":25},"end":{"row":16,"column":26},"action":"insert","lines":["d"],"id":1138}],[{"start":{"row":16,"column":26},"end":{"row":16,"column":27},"action":"insert","lines":["b"],"id":1139}],[{"start":{"row":33,"column":67},"end":{"row":33,"column":77},"action":"remove","lines":["mismatchdb"],"id":1140},{"start":{"row":33,"column":67},"end":{"row":33,"column":68},"action":"insert","lines":["e"]}],[{"start":{"row":33,"column":68},"end":{"row":33,"column":69},"action":"insert","lines":["x"],"id":1141}],[{"start":{"row":33,"column":69},"end":{"row":33,"column":70},"action":"insert","lines":["c"],"id":1142}],[{"start":{"row":33,"column":70},"end":{"row":33,"column":71},"action":"insert","lines":["e"],"id":1143}],[{"start":{"row":33,"column":71},"end":{"row":33,"column":72},"action":"insert","lines":["r"],"id":1144}],[{"start":{"row":33,"column":72},"end":{"row":33,"column":73},"action":"insert","lines":["c"],"id":1145}],[{"start":{"row":33,"column":73},"end":{"row":33,"column":74},"action":"insert","lines":["i"],"id":1146}],[{"start":{"row":33,"column":74},"end":{"row":33,"column":75},"action":"insert","lines":["s"],"id":1147}],[{"start":{"row":33,"column":75},"end":{"row":33,"column":76},"action":"insert","lines":["e"],"id":1148}],[{"start":{"row":33,"column":76},"end":{"row":33,"column":77},"action":"insert","lines":["d"],"id":1149}],[{"start":{"row":33,"column":77},"end":{"row":33,"column":78},"action":"insert","lines":["b"],"id":1150}],[{"start":{"row":34,"column":43},"end":{"row":34,"column":51},"action":"remove","lines":["mismatch"],"id":1151},{"start":{"row":34,"column":43},"end":{"row":34,"column":44},"action":"insert","lines":["e"]}],[{"start":{"row":34,"column":44},"end":{"row":34,"column":45},"action":"insert","lines":["x"],"id":1152}],[{"start":{"row":34,"column":45},"end":{"row":34,"column":46},"action":"insert","lines":["e"],"id":1153}],[{"start":{"row":34,"column":46},"end":{"row":34,"column":47},"action":"insert","lines":["r"],"id":1154}],[{"start":{"row":34,"column":47},"end":{"row":34,"column":48},"action":"insert","lines":["c"],"id":1155}],[{"start":{"row":34,"column":48},"end":{"row":34,"column":49},"action":"insert","lines":["i"],"id":1156}],[{"start":{"row":34,"column":49},"end":{"row":34,"column":50},"action":"insert","lines":["s"],"id":1157}],[{"start":{"row":34,"column":50},"end":{"row":34,"column":51},"action":"insert","lines":["e"],"id":1158}],[{"start":{"row":43,"column":38},"end":{"row":43,"column":46},"action":"remove","lines":["mismatch"],"id":1159},{"start":{"row":43,"column":38},"end":{"row":43,"column":39},"action":"insert","lines":["e"]}],[{"start":{"row":43,"column":39},"end":{"row":43,"column":40},"action":"insert","lines":["x"],"id":1160}],[{"start":{"row":43,"column":40},"end":{"row":43,"column":41},"action":"insert","lines":["e"],"id":1161}],[{"start":{"row":43,"column":41},"end":{"row":43,"column":42},"action":"insert","lines":["r"],"id":1162}],[{"start":{"row":43,"column":42},"end":{"row":43,"column":43},"action":"insert","lines":["c"],"id":1163}],[{"start":{"row":43,"column":43},"end":{"row":43,"column":44},"action":"insert","lines":["i"],"id":1164}],[{"start":{"row":43,"column":44},"end":{"row":43,"column":45},"action":"insert","lines":["s"],"id":1165}],[{"start":{"row":43,"column":45},"end":{"row":43,"column":46},"action":"insert","lines":["e"],"id":1166}],[{"start":{"row":43,"column":46},"end":{"row":43,"column":47},"action":"insert","lines":["_"],"id":1167}],[{"start":{"row":43,"column":47},"end":{"row":43,"column":48},"action":"insert","lines":["u"],"id":1168}],[{"start":{"row":43,"column":48},"end":{"row":43,"column":49},"action":"insert","lines":["s"],"id":1169}],[{"start":{"row":43,"column":49},"end":{"row":43,"column":50},"action":"insert","lines":["e"],"id":1170}],[{"start":{"row":43,"column":50},"end":{"row":43,"column":51},"action":"insert","lines":["r"],"id":1171}],[{"start":{"row":43,"column":50},"end":{"row":43,"column":51},"action":"remove","lines":["r"],"id":1172}],[{"start":{"row":43,"column":49},"end":{"row":43,"column":50},"action":"remove","lines":["e"],"id":1173}],[{"start":{"row":43,"column":48},"end":{"row":43,"column":49},"action":"remove","lines":["s"],"id":1174}],[{"start":{"row":43,"column":47},"end":{"row":43,"column":48},"action":"remove","lines":["u"],"id":1175}],[{"start":{"row":43,"column":46},"end":{"row":43,"column":47},"action":"remove","lines":["_"],"id":1176}],[{"start":{"row":53,"column":28},"end":{"row":53,"column":36},"action":"remove","lines":["mismatch"],"id":1177},{"start":{"row":53,"column":28},"end":{"row":53,"column":29},"action":"insert","lines":["e"]}],[{"start":{"row":53,"column":29},"end":{"row":53,"column":30},"action":"insert","lines":["x"],"id":1178}],[{"start":{"row":53,"column":30},"end":{"row":53,"column":31},"action":"insert","lines":["e"],"id":1179}],[{"start":{"row":53,"column":31},"end":{"row":53,"column":32},"action":"insert","lines":["r"],"id":1180}],[{"start":{"row":53,"column":32},"end":{"row":53,"column":33},"action":"insert","lines":["c"],"id":1181}],[{"start":{"row":53,"column":33},"end":{"row":53,"column":34},"action":"insert","lines":["i"],"id":1182}],[{"start":{"row":53,"column":34},"end":{"row":53,"column":35},"action":"insert","lines":["s"],"id":1183}],[{"start":{"row":53,"column":35},"end":{"row":53,"column":36},"action":"insert","lines":["e"],"id":1184}],[{"start":{"row":64,"column":25},"end":{"row":64,"column":26},"action":"remove","lines":["P"],"id":1185}],[{"start":{"row":64,"column":25},"end":{"row":64,"column":26},"action":"insert","lines":["p"],"id":1186}],[{"start":{"row":75,"column":66},"end":{"row":75,"column":67},"action":"insert","lines":["."],"id":1187}],[{"start":{"row":86,"column":0},"end":{"row":87,"column":2},"action":"remove","lines":["","?>"],"id":1188}],[{"start":{"row":85,"column":0},"end":{"row":86,"column":0},"action":"remove","lines":["",""],"id":1189}],[{"start":{"row":84,"column":2},"end":{"row":85,"column":0},"action":"remove","lines":["",""],"id":1190}],[{"start":{"row":90,"column":6},"end":{"row":91,"column":0},"action":"insert","lines":["",""],"id":1191},{"start":{"row":91,"column":0},"end":{"row":91,"column":2},"action":"insert","lines":["  "]}],[{"start":{"row":92,"column":12},"end":{"row":93,"column":4},"action":"insert","lines":["","    "],"id":1192}],[{"start":{"row":94,"column":38},"end":{"row":95,"column":0},"action":"insert","lines":["",""],"id":1193},{"start":{"row":95,"column":0},"end":{"row":95,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":107,"column":57},"end":{"row":108,"column":0},"action":"insert","lines":["",""],"id":1194},{"start":{"row":108,"column":0},"end":{"row":108,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":109,"column":13},"end":{"row":110,"column":0},"action":"insert","lines":["",""],"id":1195},{"start":{"row":110,"column":0},"end":{"row":110,"column":2},"action":"insert","lines":["  "]}],[{"start":{"row":105,"column":69},"end":{"row":105,"column":70},"action":"remove","lines":["2"],"id":1196}],[{"start":{"row":105,"column":69},"end":{"row":105,"column":70},"action":"insert","lines":["1"],"id":1197}],[{"start":{"row":101,"column":69},"end":{"row":101,"column":70},"action":"remove","lines":["2"],"id":1198},{"start":{"row":101,"column":69},"end":{"row":101,"column":70},"action":"insert","lines":["1"]}],[{"start":{"row":105,"column":54},"end":{"row":105,"column":55},"action":"remove","lines":["1"],"id":1199},{"start":{"row":105,"column":54},"end":{"row":105,"column":55},"action":"insert","lines":["2"]}],[{"start":{"row":105,"column":69},"end":{"row":105,"column":70},"action":"remove","lines":["1"],"id":1200},{"start":{"row":105,"column":69},"end":{"row":105,"column":70},"action":"insert","lines":["2"]}],[{"start":{"row":115,"column":27},"end":{"row":116,"column":0},"action":"insert","lines":["",""],"id":1201}],[{"start":{"row":96,"column":47},"end":{"row":96,"column":48},"action":"remove","lines":[":"],"id":1202}],[{"start":{"row":100,"column":48},"end":{"row":100,"column":49},"action":"remove","lines":[":"],"id":1203}],[{"start":{"row":104,"column":55},"end":{"row":104,"column":56},"action":"remove","lines":[":"],"id":1204}],[{"start":{"row":44,"column":39},"end":{"row":44,"column":44},"action":"remove","lines":["SHA('"],"id":1205}],[{"start":{"row":44,"column":49},"end":{"row":44,"column":51},"action":"remove","lines":["')"],"id":1206}],[{"start":{"row":44,"column":49},"end":{"row":44,"column":50},"action":"insert","lines":["'"],"id":1207}],[{"start":{"row":44,"column":39},"end":{"row":44,"column":40},"action":"insert","lines":["'"],"id":1208}],[{"start":{"row":44,"column":39},"end":{"row":44,"column":40},"action":"insert","lines":["S"],"id":1209}],[{"start":{"row":44,"column":40},"end":{"row":44,"column":41},"action":"insert","lines":["H"],"id":1210}],[{"start":{"row":44,"column":41},"end":{"row":44,"column":42},"action":"insert","lines":["A"],"id":1211}],[{"start":{"row":44,"column":42},"end":{"row":44,"column":43},"action":"insert","lines":["("],"id":1212}],[{"start":{"row":44,"column":55},"end":{"row":44,"column":56},"action":"insert","lines":[")"],"id":1213}]]},"timestamp":1458842072000}