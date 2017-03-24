<?php 
/*Template Name: User Managers*/
get_header();?>



<style type="text/css">
           
            .button{
                background-color:#1C2045;
                color:#E7C254;
                padding:5px 20px;
                max-width: 300px;
                line-height:1.5em;
                text-align:center;
                margin:5px auto;
            }
            .button a{ color:#E7C254;}

        </style>
    </head>

    <body>
        <div class='container'> 
          <div id="dvData">
                <?php $roles = array('subscriber');
   $users = array();

    foreach ( $roles as $role ) {
        $args = array( 
                        'role'=>$role,
                        'orderby' => 'registered',
                        'order' => 'ASC',
                        'search_columns' => 'nicename',
                        'number'=> 0,
                        'date_query'  => array(
                            'after'     => 'October 24st, 2016',
                            'before'    => array(
                                    'year'  => 2020,
                                    'month' => 12,
                                    'day'   => 10,
                        ) ),
                        'fields' => 'all_with_meta'
                    );

        $usersofrole = get_users( $args );
        $users = array_merge( $usersofrole, $users );
    }
	echo '<table style="display:none;">';
	echo '<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>Organization</th>
				<th>Tilte</th>
				<th>User street address</th>
				<th>User city</th>
				<th>User state</th>
				<th>User phone</th>
				</tr>';
    foreach ( $users as $user ) {
		
		
		echo '<tr><td>' . $user->display_name . '</td>';
        echo '<td>' . $user->user_nicename . '</td>';
		echo '<td>' . $user->user_email . '</td>';
		 
        /****start******/
		/* $user_organization = get_user_meta( $user->ID, 'user_organization ', true ); 
        if ( $user_organization ) { 
            echo '<td>' . esc_html( $user_organization ) . '</td>';
        }  */

		
		  $user_id = $user->ID;
		  $key = 'user_organization';
		  $single = true;
		  $user_last = get_user_meta( $user_id, $key, $single ); 
		  echo '<td>' . $user_last . '</td>'; 

		
		
		
		
		
		
		/* $user_organization = get_user_meta( get_user_by_meta_data( 'my_meta_key', 'my_meta_value' )->ID, 'last_name', true ); */
		
        /* $user_tilte = get_user_meta( $user->ID, 'user_tilte ', true ); 
        if ( $user_tilte ) { 
            echo '<td>' . esc_html( $user_tilte ) . '</td>';
        } */
		  $user_id_title = $user->ID;
		  $keys = 'user_tilte';
		  $singles = true;
		  $user_lasted = get_user_meta( $user_id_title, $keys, $singles ); 
		  echo '<td>' . $user_lasted . '</td>'; 
		
		/*****end*****/
		
        $user_street_address = get_user_meta( $user->ID, 'user_street_address', true ); 
        if ( $user_street_address ) { 
            echo '<td>' . esc_html( $user_street_address ) . '</td>';
        }
		
		 	
		$user_city = get_user_meta( $user->ID, 'user_city', true ); 
        if ( $user_city ) { 
            echo '<td>' . esc_html( $user_city ) . '</td>';
        } 

		
		$user_state = get_user_meta( $user->ID, 'user_state', true ); 
        if ( $user_state ) { 
            echo '<td>' . esc_html( $user_state ) . '</td>';
        }
		
		$user_phone = get_user_meta( $user->ID, 'user_phone', true ); 
        if ( $user_phone ) { 
            echo '<td>' . esc_html( $user_phone ) . '</td>';
        } 
		
        // Alternatively, get all user meta at once:
        // $all_meta_for_user = get_user_meta( $user->ID );
        // print_r( $all_meta_for_user );
		
	echo '</tr>';
		

    }
	echo '</table>';
?>
            </div>
            <br/>
            <div class='button'>
                <a href="#" id ="export" role='button'>Export into a CSV File
                </a>
            </div>

            <hr/>

        </div>

        <!-- Scripts ----------------------------------------------------------- -->
        <script type='text/javascript' src='https://code.jquery.com/jquery-1.11.0.min.js'></script>
        <!-- If you want to use jquery 2+: https://code.jquery.com/jquery-2.1.0.min.js -->
        <script type='text/javascript'>
        $(document).ready(function () {
            console.log("HELLO")
            function exportTableToCSV($table, filename) {
                var $headers = $table.find('tr:has(th)')
                    ,$rows = $table.find('tr:has(td)')
                    // Temporary delimiter characters unlikely to be typed by keyboard
                    // This is to avoid accidentally splitting the actual contents
                    ,tmpColDelim = String.fromCharCode(11) // vertical tab character
                    ,tmpRowDelim = String.fromCharCode(0) // null character
                    // actual delimiter characters for CSV format
                    ,colDelim = '","'
                    ,rowDelim = '"\r\n"';
                    // Grab text from table into CSV formatted string
                    var csv = '"';
                    csv += formatRows($headers.map(grabRow));
                    csv += rowDelim;
                    csv += formatRows($rows.map(grabRow)) + '"';
                    // Data URI
                    var csvData = 'data:application/csv;charset=utf-8,' + encodeURIComponent(csv);
                $(this)
                    .attr({
                    'download': filename
                        ,'href': csvData
                        //,'target' : '_blank' //if you want it to open in a new window
                });
                //------------------------------------------------------------
                // Helper Functions 
                //------------------------------------------------------------
                // Format the output so it has the appropriate delimiters
                function formatRows(rows){
                    return rows.get().join(tmpRowDelim)
                        .split(tmpRowDelim).join(rowDelim)
                        .split(tmpColDelim).join(colDelim);
                }
                // Grab and format a row from the table
                function grabRow(i,row){
                     
                    var $row = $(row);
                    //for some reason $cols = $row.find('td') || $row.find('th') won't work...
                    var $cols = $row.find('td'); 
                    if(!$cols.length) $cols = $row.find('th');  
                    return $cols.map(grabCol)
                                .get().join(tmpColDelim);
                }
                // Grab and format a column from the table 
                function grabCol(j,col){
                    var $col = $(col),
                        $text = $col.text();
                    return $text.replace('"', '""'); // escape double quotes
                }
            }
            // This must be a hyperlink
            $("#export").click(function (event) {
                var outputFile = 'export'
                //var outputFile = window.prompt("What do you want to name your output file (Note: This won't have any effect on Safari)") || 'export';
                outputFile = outputFile.replace('.csv','') + '.csv'
                 
                // CSV
                exportTableToCSV.apply(this, [$('#dvData>table'), outputFile]);
                
                // IF CSV, don't do event.preventDefault() or return false
                // We actually need this to be a typical hyperlink
            });
        });
    </script>



<?php get_footer();?>