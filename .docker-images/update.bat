@ECHO off


call :updateImage dsp_alpine_base dsp/alpine_base
call :updateImage dsp_alpine_router dsp/alpine_router
call :updateImage dsp_shellinabox dsp/shellinabox
call :updateImage  dsp_linode_lamp/ dsp/linode_lamp

goto:eof

:updateImage 

  cd %~dp0/%~1
  REM echo %cd%
  REM echo %cd%
  docker build -t %~2 . 
  cd ..
goto:eof

