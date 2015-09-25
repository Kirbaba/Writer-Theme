<style>
	.admin_box td{
		padding: 5px
	}
	.admin_box td a{
		color: red
	}
	.admin_box td a:hover{
		color: red
	}
	
</style>
<tr class="admin_box">
    <td><a href = "/wp-admin/admin.php?page=write_reviews&action=del&id={id}">Удалить</a></td>
    <td style="text-align: left; padding: 5px">{text}</td>
    <td>{fio}</td>
    <td>{name}</td>
    <td>{link}</td>
</tr>


