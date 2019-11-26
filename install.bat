@echo off

setlocal

set xampp_path=C:\xampp
set htdocs_path=htdocs
set mysql_path=%xampp_path%\mysql\bin
set mysql_exe=mysql.exe
set database_path=database.sql
set blogzone_path=BlogZone

set powershell=%SYSTEMROOT%\System32\WindowsPowerShell\v1.0\powershell.exe

echo ......
echo BlogZone's database importer script by Brandon Blanker Lim-it
echo ......
echo Determined file paths are as follows:
echo (Please edit this batch file if path is incorrect in your system)
echo ......
echo xampp_path = %xampp_path%
echo mysql_path = %mysql_path%
echo htdocs_path = %xampp_path%
echo blogzone_path = %blogzone_path%
echo database_path = %database_path%
echo ......

:try_mysql
	echo locating "%mysql_path%\%mysql_exe%"...
	if not exist "%mysql_path%\%mysql_exe%" (
		echo "%mysql_path%\%mysql_exe%" cannot be found. Trying user input:
		goto :locate_mysql

	) else (
		echo %mysql_exe% is found.
		echo importing %database_path%...
		"%mysql_path%/%mysql_exe%" -u root -p < "%database_path%"
		goto :try_htdocs
	)

:locate_mysql
	for /f "delims=" %%I in ('%powershell% -executionpolicy bypass -noprofile -file "file_mysql.ps1"') do (
		set "mysql_path=%%I"
		goto :try_mysql
	)

:try_htdocs
	echo locating "%htdocs_path%"...
	if not exist "%htdocs_path%" (
		echo "%htdocs_path%"  cannot be found. Trying user input:
		goto :locate_htdocs

	) else (
		echo "%htdocs_path%" is found.
		goto :try_blogzone
	)

:locate_htdocs
	for /f "delims=" %%I in ('%powershell% -executionpolicy bypass -noprofile -file "file_htdocs.ps1"') do (
		set "htdocs_path=%%I"
		goto :try_htdocs
	)

:try_blogzone
	if not exist "%blogzone_path%" (
		echo %blogzone_path% is not found. Please make sure you have downloaded and extracted it as well.
		goto :fail
	) else (
		echo "%blogzone_path%" is found.
		echo Please choose "DIRECTORY" by pressing "D"
		xcopy /s "%blogzone_path%" "%htdocs_path%\BlogZone"
		goto :finish
	)

:finish
	echo Installation is finished
	echo Trying to open the project website...
	start "" http://localhost/BlogZone

:fail
	echo Installation failed
