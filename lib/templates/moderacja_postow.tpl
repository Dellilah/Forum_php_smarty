{*
      administracja: moderacja postów
     
      @package moderacj_postow.tpl
      @author Alicja Cyganiewicz
      @link http://www.wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP
*}	
	<table width="100%" cellspacing="0" cellpadding="10">
    {foreach from=$dane.posty key=klucz item=posty}
	<tr>
	<td bgcolor="#009999" colspan="4" align="center" valign="middle"><font size=5><b>{$klucz}</b></font> </td>
	</tr>

	<tr bgcolor="#C2DFFF"> <th> Autor </th> <th colspan="2"> Post </th> <th> Data dodania </th> </tr>
	{foreach from=$posty item=post}
				
				<tr>	
					<td><a href="pokaz_profil.php?id_uz={$post.uzytkownik_forum_id_uz}">{$post.autor}</a></td>
					<td><pre>{$post.tresc}</pre></td>
					<td><a href="edytuj_post.php?id_post={$post.id_post}"> edytuj </a> ::
						<a href="usun_post.php?id_post={$post.id_post}"> usuń </a> 
					</td>
					<td>{$post.data_dodania}</td>
				</tr>
		{/foreach}
		{/foreach}
	</table>
