<?php

class Getusers extends Database {
	
	
		public function selectUsers() {

		$rpp=3;//determine the no. of results per page

		if(isset($_GET['page'])) {
			$page=$_GET['page'];
		}else {
			$page=0;
		}

		if($page>1){
			$start=($page*$rpp)-$rpp;
		}else{
			$start=0;
		}

		$pagesQuery="SELECT * FROM users";
		$pagesResult= $this->connect()->query($pagesQuery);
		
		$rowCount=$pagesResult->rowCount();

		$totalPages=$rowCount/$rpp;

		$sql="SELECT * FROM users  LIMIT $start,$rpp";
		$result = $this->connect()->query($sql);
		
		if($result->rowCount() > 0){
			
			while($row=$result->fetch()){
				$user_id=$row['user_id'];
				// $user_name=$row['user_name'];
				$email=$row['email'];
				$email=$row['password'];

				echo "

			<tbody class='white-text'>
			<tr>
			<td>$user_id</td>
			<td>$email</td>
			<td>
			<a href='members.php?delete_user=$user_id' class='btn btn-small red white-text'>Delete</a>
			</td>

			</tr>
			</tbody>


				";
			}

			echo "</table>";
			echo "<div class='section center'>";
			echo "<span class='blue-grey-text text-lighten-3 center'>Pages  </span>";

			for($x=1;$x<$totalPages+1;$x++){
				echo "
				
				<a href='?page=$x' class='btn btn-small teal white-text pagination'>$x</a>
				
				";
			}

			echo "</div>";
			
			
			
		}
	


    
	}
	
	
	
	
		public function count() {
		$sql="SELECT * FROM users ";
		$result = $this->connect()->query($sql);
		echo $result->rowCount();
	}
	
	
	
	
	
	
	
}
