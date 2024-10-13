# [PHP] WEBSITE THƯƠNG MẠI ĐIỆN TỬ - E-commerce website

## Introduction
- Mục tiêu của việc xây dựng trang web này nhằm giúp cho các cửa hàng giảm thao tác trên excel, mang lại tính chính xác và hiệu quả cao trong công tác quản lý hoạt động kinh doanh. Và khách hàng có thể mua hàng trực tiếp từ xa thông qua mạng internet phổ biến, có thể dễ dàng tham khảo thông tin sản phẩm mình tìm, so sánh giá cả các mặt hàng và lựa chọn cho mình loại sản phẩm phù hợp nhu cầu của mình, giúp công việc mua sắm một cách nhanh chóng, tiện lợi, tiết kiệm thời gian, đáp ứng được nhu cầu thực tế. Hệ thống tìm kiếm dễ dàng, giao diện thân thiện. Chỉ cần đăng nhập vào hệ thống với tài khoản đã có (nếu khách hàng đã là hội viên của cửa hàng) hay chỉ cần vài thao tác đăng ký đơn giản là khách hàng có thể tự do chọn mua và tạo đơn đặt hàng tại hệ thống. Bên cạnh đó quản trị viên có thể quản lý sản phẩm, đơn hàng và thống kê doanh thu
  
- The goal of building this website is to help stores reduce manual tasks in Excel, ensuring accuracy and high efficiency in managing business operations. Customers can also make purchases remotely through the widely accessible internet, easily browse for the products they are looking for, compare prices, and choose the most suitable items for their needs. This helps make the shopping process quick, convenient, and time-saving, while meeting real-world demands. The system features easy search functionality and a user-friendly interface. Customers only need to log into the system with their existing account (if they are already a member of the store) or complete a few simple registration steps to freely select and create orders within the system. Additionally, administrators can manage products, orders, and track revenue.

Here is my PHP source code for e-commerce website . With my code: 

				-- user : admin
					nhanvienbanhang
						nhanviengiaohang
							nhanvienkho
								khach hang
									khach hang vang lai
				phân quyền mỗi user khác nhau
				
		-- các chức năng;
				- thêm, xoa, sửa thông tin
				- thông kê tổng doanh thu
				- xuất/in hóa đơn ban hàng, phiếu nhập/xuất kho
				- xử lý đơn hàng
    >>
    User Roles:
		Admin: Full control over the system, including managing users, orders, and financial reports.
		Sales Staff (nhanvienbanhang): Manages product sales, customer orders, and can issue invoices.
		Delivery Staff (nhanviengiaohang): Manages the delivery process, updates order statuses, and processes shipping tasks.
		Warehouse Staff (nhanvienkho): Manages inventory, records stock entries, and oversees warehouse operations.
		Registered Customer (khachhang): Can browse products, place orders, and review order history.
		Guest Customer (khachhangvanglai): Can browse products and place orders, but has limited functionality compared to registered customers.
		Functionalities by Role:
		Admin:
		
		Add, edit, delete user and product information.
		View total revenue statistics.
		Generate and print sales invoices, stock entry/exit slips.
		Process all customer orders (approve, reject, update status).
		Manage access control for other roles.
		Sales Staff (nhanvienbanhang):
		
		Add, edit, delete product information.
		Process customer orders.
		Issue invoices for sales.
		Delivery Staff (nhanviengiaohang):
		
		Update delivery status for orders.
		Print delivery receipts.
		Warehouse Staff (nhanvienkho):
		
		Manage stock levels.
		Record stock entries and exits.
		Print stock entry/exit receipts.
		Registered Customer (khachhang):
		
		Browse products.
		Place orders.
		Review past orders and track current order status.
		Guest Customer (khachhangvanglai):
		
		Browse products.
		Place orders (without registration).
		By defining these roles and their associated functionalities, the system can ensure that each user has access only to the features they are permitted to use, which enhances security and 		efficiency.

## Giao Diện Người Dùng - User Interface (UI)
output:

## Giao Diện Khách Mua Hàng Trên WebSite - Customer Interface on the Website

<p align="center">
  <img src="pic/home.png" width=800><br/>
  <i> Home </i>
</p>


<p align="center">
  <img src="pic/sanpham.png" width=800><br/>
  <i> View Product </i>
</p>

<p align="center">
  <img src="pic/phukien.png" width=800><br/>
  <i> Accessories Page </i>
</p>

<p align="center">
  <img src="pic/chitietsanpham.png" width=800><br/>
  <i>**Product Details**</i>
</p>

<p align="center">
  <img src="pic/timkiemsanpham.png" width=800><br/>
  <i> **Search Product** </i>
</p>

<p align="center">
  <img src="pic/giohang.png" width=800><br/>
  <i> Shopping Cart view </i>
</p>

<p align="center">
  <img src="pic/dangkythanhvien.png" width=800><br/>
  <i> Register as a Member </i>
</p>

<p align="center">
  <img src="pic/phukien.png" width=800><br/>
  <i>**Checkout** </i>
</p>

<p align="center">
  <img src="pic/thongtincanhan.png" width=800><br/>
  <i> Edit Personal Information </i>
</p>

<p align="center">
  <img src="pic/donhang.png" width=800><br/>
  <i> 
Check Order </i>
</p>

## **Admin Page**
Quản lý Bán Hàng, Và Quản Lý Sản Phẩm, Tin Tức: 
Sales Management, Product Management, and News Management:



<p align="center">
  <img src="pic/thongkedoanhthu.png" width=800><br/>
  <i> Revenue Statistics </i>
</p>


<p align="center">
  <img src="pic/quanlysanpham.png" width=800><br/>
  <i>**Product Management**</i>
</p>

<p align="center">
  <img src="pic/quanlydanhmuc.png" width=800><br/>
  <i>**Category Management**</i>
</p>

<p align="center">
  <img src="pic/quanlydonhang.png" width=800><br/>
  <i>**Manage Customer Orders**</i>
</p>

<p align="center">
  <img src="pic/quanlynguoidung.png" width=800><br/>
  <i>**User Management**</i>
</p>

<p align="center">
  <img src="pic/quanlyhang.png" width=800><br/>
  <i>**Brand Management**</i>
</p>

<p align="center">
  <img src="pic/quanlytintuc.png" width=800><br/>
  <i>**News Forum Management**</i>
</p>

<p align="center">
  <img src="pic/quanlyphanhoi.png" width=800><br/>
  <i>**User Feedback Management**</i>
</p>




## technology used
* **PHP**
* **Javascript**
* **HTML/CSS** 
* **MySQL**
* **GiT**


