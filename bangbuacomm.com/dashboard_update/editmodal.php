
		<div class="modal" tabindex="-1" id="editModal<?php echo $row['s_id']?>" data-backdrop="static" data-keyboard="false">
			<?php echo "Now id is ".$row['s_id']?>
			<div class="modal-dialog modal-lg">
			  	<div class="modal-content" style="background-color: whitesmoke;">
					<div class="modal-header" style="background-color: #15A362;">
						<h4 class="col-12 modal-title text-center text-white">แก้ไขร้านค้า </h4>
						<button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body" style="color: rgb(36, 36, 36);">
						<div class="container">
						<form action="update.php" method="post" enctype="multipart/form-data" id="formedit">
								<input type="hidden" name="shop_id" id="shop_id_edit" value="<?php echo $row['s_id']; ?>">
								<div class="app-card-header p-3">
									<h5 class="app-card-title text-primary" >ส่วนที่ 1 ： ข้อมูลร้านค้า</h5>
								</div>
								<div class="app-card-body p-4 pt-0"></div>
									<div class="form-group row mb-3">
										<div class="col-sm-1"></div>
											<label for="shop_name" class="col-sm-3 col-form-label">ชื่อร้านค้า</label>
											<div class="col-sm-7">
												<input type="text"  value="<?php echo $row['s_name']; ?>" class="form-control" name="shop_name" id="shop_name"  title="โปรดใส่ข้อมูลให้ถูกต้อง ไม่อนุญาตให้ใช้สัญลักษณ์พิเศษณ์เช่น ' ลงในข้อความ" pattern="[^':]*$"  required placeholder="โปรดระบุชื่อร้านค้า">
											</div>
										</div>
									<div class="form-group row mb-3">
										<div class="col-sm-1"></div>
											<label for="shop_name_eng" class="col-sm-3 col-form-label">Shop Name</label>
											<div class="col-sm-7">
												<input type="text" value="<?php echo $row['s_name_eng']; ?>" class="form-control" name="shop_name_eng" id="shop_name_eng" title="โปรดใส่ข้อมูลให้ถูกต้อง อนุญาตให้ใช้ 's ลงในข้อความได้" pattern="^(\w|(\w(\w|'|\ )*\w))$" required placeholder="Please input shop name (โปรดระบุชื่อร้านค้าภาษาอังกฤษ)">
											</div>
									</div>	
									<div class="form-group row mb-3">
										<div class="col-sm-1"></div>
										<label for="shop_type" class="col-sm-3 col-form-label">ประเภทร้านค้า</label>
										<div class="col-sm-7" name="shop_type">
											<div class="col-auto mt-2" name="shop_type">
												<input class="form-check-input" type="radio" value = "ร้านอาหาร" <?php if($row['s_type'] == "ร้านอาหาร"){echo 'checked="checked"';} ?> name="shop_type" id="food">
												<label class="form-check-label" for="food">ร้านอาหาร</label>
											</div>
											<div class="col-auto mt-1 ">
												<input class="form-check-input" type="radio" value = "ร้านของหวานและเครื่องดื่ม" <?php if($row['s_type'] == "ร้านของหวานและเครื่องดื่ม"){echo 'checked="checked"';} ?> name="shop_type" id="drink" >
												<label class="form-check-label" for="drink">ร้านของหวานและเครื่องดื่ม</label>
											</div>
											<div class="col-auto mt-1 ">
												<input class="form-check-input" type="radio" value = "ร้านค้าและการบริการอื่นๆ" <?php if($row['s_type'] == "ร้านค้าและการบริการอื่นๆ"){echo 'checked="checked"';} ?> name="shop_type" id="others">
												<label class="form-check-label" for="others">ร้านค้าและบริการอื่นๆ</label>
											</div>
										</div>
									</div>
									<div class="form-group row mb-3">
										<div class="col-sm-1"></div>
										<label for="shop_phone" class="col-sm-3 col-form-label" >เบอร์โทรศัพท์</label>
										<div class="col-sm-7">
											<input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" value="<?php echo $row['s_phone']; ?>" title="ข้อมูลไม่ถูกต้องโปรดใส่ในรูปแบบ 012-345-6789" class="form-control" name="shop_phone" id="shop_phone"   title="โปรดใส่ข้อมูล" required placeholder="โปรดใส่หมายเลขให้ครบ 9-10 หลัก" onkeyup="autoTab(this)" min="9" max="10">
										</div>
									</div>
									<div class="form-group row mb-3">
										<div class="col-sm-1"></div>
										<label for="shop_map" class="col-sm-3 col-form-label">แผนที่ Google Map</label>
										<div class="col-sm-7 ">
											<input type="url" class="form-control" name="shop_map" id="shop_map" value="<?php echo $row['s_map']; ?>"  placeholder="โปรดระบุแผนที่ Google Map เป็นลิงค์" title="โปรดใส่ข้อมูลให้ถูกต้อง ไม่อนุญาตให้ใช้สัญลักษณ์พิเศษณ์เช่น ' ลงในข้อความ" pattern="[^']*$" >
											
										</div>
									</div>
									<div class="form-group row mb-3">
										<div class="col-sm-1"></div>
										<label for="shop_address" class="col-sm-3 col-form-label">ที่อยู่ร้านค้า</label>
										<div class="col-sm-7 form-floating">
											<textarea class="form-control"  name="shop_address" id="shop_address" style="height: 80px;"  title="โปรดใส่ข้อมูลให้ถูกต้อง ไม่อนุญาตให้ใช้สัญลักษณ์พิเศษณ์เช่น ' ลงในข้อความ" pattern="[^':]*$"  required placeholder="โปรดกรอกที่อยู่ร้านค้าให้ถูกต้อง"><?php echo $row['s_address']; ?></textarea>
										</div>
									</div>
									<div class="form-group row mb-3">
										<div class="col-sm-1"></div>
										<label for="shop_time" class="col-sm-3 col-form-label">เวลาเปิด-ปิด</label>
										<div class="col-sm-7 form-floating">
											<textarea class="form-control"  name="shop_time" id="shop_time" style="height: 100px;"  title="โปรดใส่ข้อมูลให้ถูกต้อง ไม่อนุญาตให้ใช้สัญลักษณ์พิเศษณ์เช่น ' ลงในข้อความ" pattern="[^':]*$"  required placeholder="โปรดระบุวัน และเวลาเปิด-ปิดของร้านค้า"><?php echo $row['s_time']; ?></textarea>
											 <p style="color: red;"> กรุณาอย่านำข้อความ &#60;br&#62; ออก </p>
										</div>
									</div>
									<div class="form-group row mb-3">
										<div class="col-sm-1"></div>
										<label for="shop_exp" class="col-sm-3 col-form-label">คำอธิบายร้านค้า</label>
										<div class="col-sm-7 form-floating">
											<textarea type="text" class="form-control" name="shop_exp" id="shop_exp" style="height: 100px;"  title="โปรดใส่ข้อมูลให้ถูกต้อง ไม่อนุญาตให้ใช้สัญลักษณ์พิเศษณ์เช่น ' ลงในข้อความ" pattern="[^':]*$"  placeholder="โปรดระบุคำอธิบายร้านค้าสั้นๆ"><?php echo $row['s_detail']; ?></textarea>
										</div>
									</div>
									<div class="app-card-header p-3">
								<h5 class="app-card-title text-primary">ส่วนที่ 2 ： รูปภาพร้านค้า</h5>
								รูปภาพร้านค้าควรมีขนาดไม่เกิน 1280*853 pixel และจำกัดขนาดไฟล์ต่อรูปไม่เกิน 5 MB
							</div>
							<div class="app-card-body p-3 pt-0 " id="div-uncheck">
								<div class="form-group " >
								
								<?php
										$id =1;
										$sql3 = $fetchdata->fetchpic($row['s_id']);
											while ($test2 = mysqli_fetch_array($sql3)) {
												$picbyid[] = $test2['ps_id'];
												$picpath[] = $test2['ps_path'];
												//print_r($test2);
												
										}
										//print_r($picbyidall);
										//count pic
										$cp = count($picbyid);
										//print_r($picpath);
										//print_r($picbyid);
										//print_r($picbyidall)
										//echo "last ps id ".$lastps_id;
										//echo "pic now = ".$cp;
										//echo "lastid = ".$lastps_id+1;
										//for($x=1;$x<$cp;$x++){
											//echo "id ".$picbyid[$x];
										//}
										$after1 =1;
										if($cp!=0){
											//echo '<input type="hidden" name="lastps_id" value="'.$lastps_id.'">';
											for($i=0;$i<$cp;$i++){
												if($id == 1){
													echo ' 
													<!--Start pic-->
													<div class="col-lg-12 col-12 row">
														<input type="hidden" name="ps_id'.$id.'" value="'.$picbyid[$i].'">
														<input type="hidden" name="ps_path'.$id.'" value="'.$picpath[$i].'">
														<label for="shop_pic'.$id.'" class="col-form-label text-primary"><b>รูปภาพที่ '.$id.'</b></label>
														<div class="col-12 col-md-6 text-center" >
															<img id="img_pic_edit'.$id.'" width="210" height="142" class="rounded mx-auto d-block" src="'.$picpath[$i].'"/>
														</div>
														<div class="col-12 col-md-6" >
															<input class="form-check-input" type="radio" name="editchoice'.$id.'" id="nochangecheck'.$id.'" value="ไม่เปลี่ยนแปลง" checked>
															<label class="form-check-label" for="nochangecheck'.$id.'" >
																ไม่เปลี่ยนแปลง
															</label>
															<br>
															<input class="form-check-input" type="radio" name="editchoice'.$id.'" id="changecheck'.$id.'" value="เปลี่ยนรูป">
															<label class="form-check-label" for="changecheck'.$id.'" >
																เปลี่ยนรูป
															</label>
															<input type="file" name="e_pic'.$id.'" id="e_pic'.$id.'" disabled class="form-control form-control-sm mt-1" accept="image/gif, image/jpeg, image/png, image/jpg" required>
															<br>
															<input class="form-check-input" type="radio" name="editchoice'.$id.'" id="delcheck'.$id.'" value = "ลบรูป" disabled>
															<label class="form-check-label" for="delpic'.$id.'" >
																ลบ
															</label>
														</div>	
													</div>
													<hr noshade>
													<!--end pic-->';
																										
												}
												else{
													//$i+=1;
													//echo " i now ".$i;
													echo ' 
													<!--Start pic-->
													<div class="col-lg-12 col-12 row">
														<input type="hidden" name="ps_id'.$id.'" value="'.$picbyid[$i].'">
														<input type="hidden" name="ps_path'.$id.'" value="'.$picpath[$i].'">
														<label for="shop_pic'.$id.'" class="col-form-label text-primary"><b>รูปภาพที่ '.$id.'</b></label>
														<div class="col-12 col-md-6 text-center" >
															<img id="img_pic_edit'.$id.'" width="210" height="142" class="rounded mx-auto d-block bg-white" src="'.$picpath[$i].'"/>
														</div>
														<div class="col-12 col-md-6" >
															<input class="form-check-input" type="radio" name="editchoice'.$id.'" id="nochangecheck'.$id.'" value="ไม่เปลี่ยนแปลง" checked>
															<label class="form-check-label" for="nochangecheck'.$id.'" >
																ไม่เปลี่ยนแปลง
															</label>
															<br>
															<input class="form-check-input" type="radio" name="editchoice'.$id.'" id="changecheck'.$id.'" value="เปลี่ยนรูป">
															<label class="form-check-label" for="changecheck'.$id.'" >
																เปลี่ยนรูป
															</label>
															<input type="file" name="e_pic'.$id.'" id="e_pic'.$id.'" disabled class="form-control form-control-sm mt-1" accept="image/gif, image/jpeg, image/png, image/jpg" required>
															<br>
															<input class="form-check-input" type="radio" name="editchoice'.$id.'" id="delcheck'.$id.'" value = "ลบรูป">
															<label class="form-check-label" for="delpic'.$id.'" >
																ลบ
															</label>
														</div>	
													</div>
													<hr noshade>
													<!--end pic-->';
												}

												//echo $id;
												$id +=1;
											}
										}
										for($cp = $cp;$cp<3;$cp++){
											$id= $cp+1;
											echo '
											<div class="col-lg-12 col-12 row" id="picdiv">
											<label for="shop_pic1" class="col-form-label text-primary"><b>รูปภาพที่ '.$id.'</b></label>
											<div class="col-12 col-md-6 text-center" >
											<img id="img_pic_edit'.$id.'" width="210" height="142" class="rounded mx-auto d-block bg-white" />
											</div>
											<div class="col-12 col-md-6 " >
												<input class="form-check-input" disabled type="checkbox" name="addpic'.$id.'" id="addpic'.$id.'" value="เพิ่มรูป">
												<label class="form-check-label" for="changecheck'.$id.'" >
													เพิ่มรูป <p style="color:red;">โปรดติ๊ก เพิ่มรูปภาพ หากต้องการเพิ่มรูปภาพ</p>
												</label>
												<input type="file" disabled required name="e_pic'.$id.'" id="e_pic'.$id.'" class="form-control form-control-sm mt-1" accept="image/gif, image/jpeg, image/png, image/jpg" onchange="document.getElementById("img_pic_edit'.$id.'").src = window.URL.createObjectURL(this.files[0])">
											</div>	
										</div>
										<hr noshade>';
										
										}
											
								?>
									

								</div>
								
								<div class="modal-footer">
									<input onclick="clicked()" type="submit" name="btn_edit" id="btn_edit" class="btn app-btn-primary btn-lg" value="แก้ไขข้อมูล">
									<button type="button" class="btn btn-secondary " data-dismiss="modal">ยกเลิก</button>
								</div>
								</div> <!--End card body -->
							</form> <!--End first form -->

							
							<!--Upload pic-->
							
						</div>
					</div>
				</div>
			</div>
		</div>	