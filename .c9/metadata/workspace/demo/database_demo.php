{"changed":true,"filter":false,"title":"database_demo.php","tooltip":"/demo/database_demo.php","value":"<html>\n    <body>\n        <?php\n        \n            $dbc = mysqli_connect('localhost', 'root', '', 'GREGER')\n                or die('Error connecting to MySQL server.');\n                \n            $query = \"INSERT INTO fullname (first_name, last_name) \" .\n                \"VALUES ('$first_name', '$last_name')\";\n        \n        ?>\n    </body>\n</html>","undoManager":{"mark":-155,"position":100,"stack":[[{"start":{"row":7,"column":13},"end":{"row":7,"column":14},"action":"insert","lines":["q"],"id":154}],[{"start":{"row":7,"column":14},"end":{"row":7,"column":15},"action":"insert","lines":["u"],"id":155}],[{"start":{"row":7,"column":15},"end":{"row":7,"column":16},"action":"insert","lines":["e"],"id":156}],[{"start":{"row":7,"column":16},"end":{"row":7,"column":17},"action":"insert","lines":["r"],"id":157}],[{"start":{"row":7,"column":17},"end":{"row":7,"column":18},"action":"insert","lines":["y"],"id":158}],[{"start":{"row":7,"column":18},"end":{"row":7,"column":19},"action":"insert","lines":[" "],"id":159}],[{"start":{"row":7,"column":19},"end":{"row":7,"column":20},"action":"insert","lines":["="],"id":160}],[{"start":{"row":7,"column":20},"end":{"row":7,"column":21},"action":"insert","lines":[" "],"id":161}],[{"start":{"row":7,"column":21},"end":{"row":7,"column":23},"action":"insert","lines":["\"\""],"id":162}],[{"start":{"row":7,"column":22},"end":{"row":7,"column":23},"action":"insert","lines":["I"],"id":163}],[{"start":{"row":7,"column":23},"end":{"row":7,"column":24},"action":"insert","lines":["N"],"id":164}],[{"start":{"row":7,"column":24},"end":{"row":7,"column":25},"action":"insert","lines":["S"],"id":165}],[{"start":{"row":7,"column":25},"end":{"row":7,"column":26},"action":"insert","lines":["E"],"id":166}],[{"start":{"row":7,"column":26},"end":{"row":7,"column":27},"action":"insert","lines":["R"],"id":167}],[{"start":{"row":7,"column":27},"end":{"row":7,"column":28},"action":"insert","lines":["T"],"id":168}],[{"start":{"row":7,"column":28},"end":{"row":7,"column":29},"action":"insert","lines":[" "],"id":169}],[{"start":{"row":7,"column":29},"end":{"row":7,"column":30},"action":"insert","lines":["I"],"id":170}],[{"start":{"row":7,"column":30},"end":{"row":7,"column":31},"action":"insert","lines":["N"],"id":171}],[{"start":{"row":7,"column":31},"end":{"row":7,"column":32},"action":"insert","lines":["T"],"id":172}],[{"start":{"row":7,"column":32},"end":{"row":7,"column":33},"action":"insert","lines":["O"],"id":173}],[{"start":{"row":7,"column":33},"end":{"row":7,"column":34},"action":"insert","lines":[" "],"id":174}],[{"start":{"row":7,"column":34},"end":{"row":7,"column":35},"action":"insert","lines":["f"],"id":175}],[{"start":{"row":7,"column":35},"end":{"row":7,"column":36},"action":"insert","lines":["u"],"id":176}],[{"start":{"row":7,"column":36},"end":{"row":7,"column":37},"action":"insert","lines":["l"],"id":177}],[{"start":{"row":7,"column":37},"end":{"row":7,"column":38},"action":"insert","lines":["l"],"id":178}],[{"start":{"row":7,"column":38},"end":{"row":7,"column":39},"action":"insert","lines":["n"],"id":179}],[{"start":{"row":7,"column":39},"end":{"row":7,"column":40},"action":"insert","lines":["a"],"id":180}],[{"start":{"row":7,"column":40},"end":{"row":7,"column":41},"action":"insert","lines":["m"],"id":181}],[{"start":{"row":7,"column":41},"end":{"row":7,"column":42},"action":"insert","lines":["e"],"id":182}],[{"start":{"row":7,"column":42},"end":{"row":7,"column":43},"action":"insert","lines":[" "],"id":183}],[{"start":{"row":7,"column":43},"end":{"row":7,"column":44},"action":"insert","lines":["("],"id":184}],[{"start":{"row":7,"column":44},"end":{"row":7,"column":45},"action":"insert","lines":["f"],"id":185}],[{"start":{"row":7,"column":45},"end":{"row":7,"column":46},"action":"insert","lines":["i"],"id":186}],[{"start":{"row":7,"column":46},"end":{"row":7,"column":47},"action":"insert","lines":["r"],"id":187}],[{"start":{"row":7,"column":47},"end":{"row":7,"column":48},"action":"insert","lines":["s"],"id":188}],[{"start":{"row":7,"column":48},"end":{"row":7,"column":49},"action":"insert","lines":["t"],"id":189}],[{"start":{"row":7,"column":49},"end":{"row":7,"column":50},"action":"insert","lines":["_"],"id":190}],[{"start":{"row":7,"column":44},"end":{"row":7,"column":50},"action":"remove","lines":["first_"],"id":191},{"start":{"row":7,"column":44},"end":{"row":7,"column":54},"action":"insert","lines":["first_name"]}],[{"start":{"row":7,"column":54},"end":{"row":7,"column":55},"action":"insert","lines":[","],"id":192}],[{"start":{"row":7,"column":55},"end":{"row":7,"column":56},"action":"insert","lines":[" "],"id":193}],[{"start":{"row":7,"column":56},"end":{"row":7,"column":57},"action":"insert","lines":["l"],"id":194}],[{"start":{"row":7,"column":57},"end":{"row":7,"column":58},"action":"insert","lines":["a"],"id":195}],[{"start":{"row":7,"column":58},"end":{"row":7,"column":59},"action":"insert","lines":["s"],"id":196}],[{"start":{"row":7,"column":59},"end":{"row":7,"column":60},"action":"insert","lines":["t"],"id":197}],[{"start":{"row":7,"column":56},"end":{"row":7,"column":60},"action":"remove","lines":["last"],"id":198},{"start":{"row":7,"column":56},"end":{"row":7,"column":65},"action":"insert","lines":["last_name"]}],[{"start":{"row":7,"column":65},"end":{"row":7,"column":66},"action":"insert","lines":[")"],"id":199}],[{"start":{"row":7,"column":66},"end":{"row":7,"column":67},"action":"insert","lines":[" "],"id":200}],[{"start":{"row":7,"column":69},"end":{"row":7,"column":70},"action":"insert","lines":["."],"id":201}],[{"start":{"row":7,"column":70},"end":{"row":7,"column":76},"action":"insert","lines":["$query"],"id":202}],[{"start":{"row":7,"column":75},"end":{"row":7,"column":76},"action":"remove","lines":["y"],"id":203}],[{"start":{"row":7,"column":74},"end":{"row":7,"column":75},"action":"remove","lines":["r"],"id":204}],[{"start":{"row":7,"column":73},"end":{"row":7,"column":74},"action":"remove","lines":["e"],"id":205}],[{"start":{"row":7,"column":72},"end":{"row":7,"column":73},"action":"remove","lines":["u"],"id":206}],[{"start":{"row":7,"column":71},"end":{"row":7,"column":72},"action":"remove","lines":["q"],"id":207}],[{"start":{"row":7,"column":70},"end":{"row":7,"column":71},"action":"remove","lines":["$"],"id":208}],[{"start":{"row":7,"column":70},"end":{"row":7,"column":73},"action":"remove","lines":["   "],"id":209},{"start":{"row":7,"column":70},"end":{"row":8,"column":0},"action":"insert","lines":["",""]},{"start":{"row":8,"column":0},"end":{"row":8,"column":12},"action":"insert","lines":["            "]}],[{"start":{"row":8,"column":12},"end":{"row":8,"column":16},"action":"insert","lines":["    "],"id":210}],[{"start":{"row":8,"column":16},"end":{"row":8,"column":18},"action":"insert","lines":["\"\""],"id":211}],[{"start":{"row":8,"column":17},"end":{"row":8,"column":18},"action":"insert","lines":["V"],"id":212}],[{"start":{"row":8,"column":18},"end":{"row":8,"column":19},"action":"insert","lines":["a"],"id":213}],[{"start":{"row":8,"column":19},"end":{"row":8,"column":20},"action":"insert","lines":["l"],"id":214}],[{"start":{"row":8,"column":19},"end":{"row":8,"column":20},"action":"remove","lines":["l"],"id":215}],[{"start":{"row":8,"column":18},"end":{"row":8,"column":19},"action":"remove","lines":["a"],"id":216}],[{"start":{"row":8,"column":18},"end":{"row":8,"column":19},"action":"insert","lines":["A"],"id":217}],[{"start":{"row":8,"column":19},"end":{"row":8,"column":20},"action":"insert","lines":["L"],"id":218}],[{"start":{"row":8,"column":20},"end":{"row":8,"column":21},"action":"insert","lines":["U"],"id":219}],[{"start":{"row":8,"column":21},"end":{"row":8,"column":22},"action":"insert","lines":["E"],"id":220}],[{"start":{"row":8,"column":22},"end":{"row":8,"column":23},"action":"insert","lines":["S"],"id":221}],[{"start":{"row":8,"column":23},"end":{"row":8,"column":24},"action":"insert","lines":[" "],"id":222}],[{"start":{"row":8,"column":24},"end":{"row":8,"column":25},"action":"insert","lines":["("],"id":223}],[{"start":{"row":8,"column":25},"end":{"row":8,"column":26},"action":"insert","lines":["'"],"id":224}],[{"start":{"row":8,"column":26},"end":{"row":8,"column":27},"action":"insert","lines":["$"],"id":225}],[{"start":{"row":8,"column":27},"end":{"row":8,"column":28},"action":"insert","lines":["f"],"id":226}],[{"start":{"row":8,"column":28},"end":{"row":8,"column":29},"action":"insert","lines":["i"],"id":227}],[{"start":{"row":8,"column":29},"end":{"row":8,"column":30},"action":"insert","lines":["r"],"id":228}],[{"start":{"row":8,"column":30},"end":{"row":8,"column":31},"action":"insert","lines":["s"],"id":229}],[{"start":{"row":8,"column":31},"end":{"row":8,"column":32},"action":"insert","lines":["t"],"id":230}],[{"start":{"row":8,"column":32},"end":{"row":8,"column":33},"action":"insert","lines":["_"],"id":231}],[{"start":{"row":8,"column":33},"end":{"row":8,"column":34},"action":"insert","lines":["n"],"id":232}],[{"start":{"row":8,"column":34},"end":{"row":8,"column":35},"action":"insert","lines":["a"],"id":233}],[{"start":{"row":8,"column":35},"end":{"row":8,"column":36},"action":"insert","lines":["m"],"id":234}],[{"start":{"row":8,"column":36},"end":{"row":8,"column":37},"action":"insert","lines":["e"],"id":235}],[{"start":{"row":8,"column":37},"end":{"row":8,"column":38},"action":"insert","lines":["'"],"id":236}],[{"start":{"row":8,"column":38},"end":{"row":8,"column":39},"action":"remove","lines":["\""],"id":237}],[{"start":{"row":8,"column":38},"end":{"row":8,"column":39},"action":"insert","lines":[","],"id":238}],[{"start":{"row":8,"column":39},"end":{"row":8,"column":40},"action":"insert","lines":[" "],"id":239}],[{"start":{"row":8,"column":40},"end":{"row":8,"column":41},"action":"insert","lines":["'"],"id":240}],[{"start":{"row":8,"column":41},"end":{"row":8,"column":42},"action":"insert","lines":["$"],"id":241}],[{"start":{"row":8,"column":42},"end":{"row":8,"column":43},"action":"insert","lines":["l"],"id":242}],[{"start":{"row":8,"column":43},"end":{"row":8,"column":44},"action":"insert","lines":["a"],"id":243}],[{"start":{"row":8,"column":44},"end":{"row":8,"column":45},"action":"insert","lines":["s"],"id":244}],[{"start":{"row":8,"column":45},"end":{"row":8,"column":46},"action":"insert","lines":["t"],"id":245}],[{"start":{"row":8,"column":46},"end":{"row":8,"column":47},"action":"insert","lines":["_"],"id":246}],[{"start":{"row":8,"column":47},"end":{"row":8,"column":48},"action":"insert","lines":["n"],"id":247}],[{"start":{"row":8,"column":48},"end":{"row":8,"column":49},"action":"insert","lines":["a"],"id":248}],[{"start":{"row":8,"column":49},"end":{"row":8,"column":50},"action":"insert","lines":["m"],"id":249}],[{"start":{"row":8,"column":50},"end":{"row":8,"column":51},"action":"insert","lines":["e"],"id":250}],[{"start":{"row":8,"column":51},"end":{"row":8,"column":52},"action":"insert","lines":["'"],"id":251}],[{"start":{"row":8,"column":52},"end":{"row":8,"column":53},"action":"insert","lines":["\""],"id":252}],[{"start":{"row":8,"column":52},"end":{"row":8,"column":53},"action":"insert","lines":[")"],"id":253}],[{"start":{"row":8,"column":54},"end":{"row":8,"column":55},"action":"insert","lines":[";"],"id":254}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":8,"column":55},"end":{"row":8,"column":55},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1453844445705}