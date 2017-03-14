#include "reg52.h"
#include <string.h>
//Define Pin and Button

#define RS			P16	
#define RW			P17		
#define E			P11
#define BL			P15
#define BZ		    P27
#define PB1			P33
#define PB2			P10
#define PB3			P12	
#define PB4			P13
#define PB5			P14
#define CL		0x3a	   // ':'
//Declare
unsigned char msec,sec,min,hr;		//for timer0 alarm
unsigned char dsec1,dmin1,dhour1,dsec2,dmin2,dhour2;	//for display timer0
unsigned char Setmin=0, Sethour=0; //SetTime
unsigned char dSetmin1=0, dSethour1=0, dSetmin2=0, dSethour2=0; //for display SetTime
unsigned char SetAlarmmin=0, SetAlarmhr=0;	//SetAlarm
unsigned char dAmin1, dAmin2, dAhour1, dAhour2;	//for display SetAlarm
unsigned char B0=0,b1,b2=0,b3 = 0, b4 = 0,  b5 = 0, b6 = 0;	
unsigned char alarmFlag=0;
//----- Delay Subroutine -------
void delay( unsigned long duration)
{
	while ( ( duration -- )!= 0);
}
//--------- Strobe Signal for LCD -----
void strobe()
{
	E = 1;
	delay( 50 );
	E = 0;
	delay( 50 );
}
//----- LCD initialisation -----
void LCD_init()
{
	unsigned char x;		
	for ( x = 0 ; x < 3 ; x ++){
		P0 = 0x30;
		RS = 0;				   //instruction input    RS=1 data input
		RW = 0;				    //write to LCD     RW=1 read from LCD
		strobe();
		delay( 750 );
	}	
	P0 = 0x38;		 //Set no. of lines and font size
	strobe();
	P0 = 0x0c;		  //Cursor blinking
	strobe();
	P0 = 0x01;		   //clear display
	strobe();
	P0 = 0x02;			//return home
	strobe();
}
//----- LCD Character Print routine --------
void LCD_Print( unsigned char x)
{
	P0 = x;
	RS = 1;
	strobe();
}
//----- LCD Command ----------
void LCD_Command( unsigned char x)
{
	P0 = x;
	RS = 0;
	strobe();
}
//------ LCD Line Print ---------
void LCD_Print_Line( printData )
unsigned char *printData;
{
	unsigned char x;
	for( x = 0 ; x < strlen( printData ); x++)
		LCD_Print( printData[ x ] );	
}

void BackLight()
{
	
	BL=~BL;
	
}
void timer0 (void) interrupt 1
{
	TF0=0;
	TH0=0XB1;			  //20000 
	TL0=0XE0;
	msec++;
	if(msec==100)
	{
		sec++;
		msec=0;
		if (sec == 60)
		{
			min++;
	    sec = 0;
		} 
		if (min == 60)
	  {
			hr++;
			min =0;
	  }
	  if (hr == 24 )
	  {
			hr=0;
			
	  }
		
	}
	dsec1 = (sec/10) | 0x30;					 // or 
	dsec2 = (sec%10) | 0x30;
	dmin1 = (min/10) | 0x30;
	dmin2 = (min%10) | 0x30;
	dhour1 = (hr/10) | 0x30;
	dhour2 = (hr%10) | 0x30;
	
}


 void LCD_PrintTimeSet()
{
	dSetmin1= (Setmin/10) | 0x30;		  //
	dSetmin2 = (Setmin%10) | 0x30;
	dSethour1 = (Sethour/10) | 0x30;
	dSethour2 = (Sethour%10) | 0x30;
	
	LCD_Print(dSethour1);
  LCD_Print(dSethour2);
  LCD_Print(CL);
  LCD_Print(dSetmin1);
  LCD_Print(dSetmin2);
}

void LCD_PrintAlarm()
{
	dAmin1 = (SetAlarmmin/10) | 0x30;
	dAmin2 = (SetAlarmmin%10) | 0x30;
	dAhour1 = (SetAlarmhr/10) | 0x30;
	dAhour2 = (SetAlarmhr%10) | 0x30;

	LCD_Print(dAhour1);
  LCD_Print(dAhour2);
  LCD_Print(CL);
 	LCD_Print(dAmin1);
 	LCD_Print(dAmin2);	
}
void alarmCheck()
{
	if (hr == SetAlarmhr && min == SetAlarmmin && alarmFlag == 1)
	{
		BZ = 1;
		BL = 1;
		LCD_Command(0x01);
		for (;;)
		{
			LCD_Command(0x80);
			LCD_Print_Line("ALARM PB3 SNOOZE");
			LCD_Command(0xC0);
			LCD_Print_Line("PB4 TO STOP");
			if (PB3 == 0)
			{
		
				SetAlarmmin = min;
				SetAlarmmin += 1;
				break;
			}
			if (PB4 == 0)
			{
				alarmFlag = 0;
				SetAlarmhr = 0;
				SetAlarmmin = 0;
		
				break;
			}

		}
		LCD_Command(0x01);
		BZ = 0;
		BL = 0;
	}
}


void setTime()
{
	LCD_Command(0x01);;
	for(;;)
	{
		alarmCheck();
		if(PB1==0)			   //PB1 set +hour
		{
			Sethour++;
			if(Sethour>23) Sethour=0; 
			delay(9000);
		}
		if(PB2==0)					//PB2 SET +MIN
		{
			Setmin++; 
			if(Setmin>59)Setmin=0;
			delay(9000);
		}
		if(PB3==0)				  // PB3 SET  -MIN
		{
			if(Setmin<1)Setmin=60;
			Setmin--;
			delay(9000);	
		}							
		while(PB4==0)				  // SETTING help
		{
			LCD_Command(0x01); //CLEAR	LCD
			for(;;)
			{
				alarmCheck();	  
				LCD_Command(0x80);		   //Force cursor to the beginning of 1st line
				LCD_Print_Line("B1 Hr+ B2 Min+");
				LCD_Command(0xc0);
				LCD_Print_Line("B3 Min-");

	

				if((PB5==0)&&(b3==0))
				{	
					b3=1;
				}
				if((PB5==1)&&(b3==1))
				{
					b3=0;
					LCD_Command(0x01);
					break;
				}
				
			}
		}
		
		if(PB5==0)
		{
			LCD_Command(0x01);
			break;
		}
		LCD_Command(0x80);			 //Force cursor to the beginning of 1st line
		LCD_Print_Line("SET TIME:");
		LCD_Command(0xC0);	 		//Force cursor to the beginning of 2nd line
		LCD_PrintTimeSet();
		

	}
}


void LCD_PrintTime()
{
	LCD_Print(dhour1);
  LCD_Print(dhour2);
  LCD_Print(CL);
  LCD_Print(dmin1);
  LCD_Print(dmin2);
  LCD_Print(CL);
  LCD_Print(dsec1);
  LCD_Print(dsec2);
}



void Time()
{
	LCD_Command( 0x01 );
	for(;;)
	{
		alarmCheck();
		LCD_Command(0x83);
		LCD_Print_Line("Time Now Is: ");
		LCD_Command(0xc1);
		LCD_PrintTime();
		if(PB1==0)
		{
			b1=1;
		}
		if((PB1==1)&&(b1==1))
		{
			setTime();
			b1=0;
		}
		
		while(PB4==0)
		{
			LCD_Command(0x01);
			for(;;)
			{
				alarmCheck();
				LCD_Command(0x80);
				LCD_Print_Line("B1 SetTime");
				LCD_Command(0xc0);
				LCD_Print_Line("  ^_^  ");

			

				if((PB5==0)&&(b4==0))
				{	
					b4=1;
				}
				if((PB5==1)&&(b4==1))
				{
					b4=0;
					LCD_Command(0x01);
					break;
				}	
				
			}
		}
		if(PB5==0)
		{
      		LCD_Command(0x01);	
			break;
		}
	}
}

void setAlarm()
{
	LCD_Command(0x01);	
	for(;;)
	{
		//alarmCheck();
		if(PB1==0)
		{
			SetAlarmhr++;						   //PB1 HOUR+
			if(SetAlarmhr>23) SetAlarmhr=0; 
			delay(9000);
			alarmFlag=1;
		}
		
		if(PB2==0)
		{
			SetAlarmmin++; 						   // PB2 MIN+
			if(SetAlarmmin>59)SetAlarmmin=0;
			delay(9000);
			alarmFlag=1;
		}
		if(PB3==0)
		{
			if(SetAlarmmin<1)SetAlarmmin=60;			//PB3 MIN-
			SetAlarmmin--;
      delay(9000);
			alarmFlag=1;	
		}
		while(PB4==0)
		{
			LCD_Command(0x01);
			for(;;)
			{
				alarmCheck();
				LCD_Command(0x80);
				LCD_Print_Line("B1 Hr+ B2 Min+");
				LCD_Command(0xc0);
				LCD_Print_Line("B3 Min-");


				if((PB5==0)&&(b5==0))
				{	
					b5=1;
				}
				if((PB5==1)&&(b5==1))
				{
					b5=0;	  
					LCD_Command(0x01);
					break;
				}
				
			}
		}
		if(PB5==0)
		{
			LCD_Command(0x01);
			break;
		}
		LCD_Command(0x80);
		LCD_Print_Line("SET ALARM");
		LCD_Command(0xC0);
		LCD_PrintAlarm();
	}
}

unsigned char swmsec,swsec,swmin;
unsigned char wmsec1,wsec1,wmin1,wmsec2,wsec2,wmin2	;
unsigned char b7=0,b8=0,b9=0;

void timer1 (void) interrupt 3
{
	TF1=0;
	TH1=0XB1;
	TL1=0XE0;
	swmsec++;
	if(swmsec==100)
	{
		swsec++;
		swmsec=0;
		if (swsec == 60)
		{
			swmin++;
	    swsec = 0;
		} 
		if (swmin == 60)
	  {
			swmin =0;
	  }
	}
	wmsec1 = (swmsec/10) | 0x30;
	wmsec2 = (swmsec%10) | 0x30;
	wsec1 = (swsec/10) | 0x30;
	wsec2 = (swsec%10) | 0x30;
	wmin1 = (swmin/10) | 0x30;
	wmin2 = (swmin%10) | 0x30;
}
void stopwatch()
{
  		LCD_Command(0x01);
		LCD_Command(0x80);
		LCD_Print_Line("STOP WATCH:");
		LCD_Command(0xc0);
		LCD_Print_Line("00:00:00");	

	  for(;;)
	  {

		while(PB1==0)	   //start watch 
		{
			 
			 LCD_Command(0x01);
			 TR1=1;
			 LCD_Command(0x80);
			 LCD_Print_Line("STOP WATCH:");
		     LCD_Command(0xC0);
			 	LCD_Print(wmin1);
   				LCD_Print(wmin2);
  				LCD_Print(CL);
				LCD_Print(wsec1);
  				LCD_Print(wsec2);
				LCD_Print(CL);
  				LCD_Print(wmsec1);
  				LCD_Print(wmsec2);
		 if((PB2==0)&&(b7=0))
		{
			b7=1;	
		}
		if((PB2==1)&&(b7=1))		//stop watch
		{
			 TR1=~TR1;
			 b7=0;
		}
		}
	}	
}


void main()
{
	BZ= 0;	//Off Buzzer	
	E = 0;  
	LCD_init();	//initialize the LCD 
	LCD_Command( 0x01 );	// clear screen
	EA=1;
  ET0=1;
	ET1=1;
  TMOD = 0x11;
  TR0 = 1;
	TR1 = 0;
	
	LCD_Command( 0x80 );
	LCD_Print_Line("JINGYI 120100X");
	LCD_Command( 0xc8 );
	LCD_Print_Line("BE HAPPY");
	delay(30000);
	LCD_Command( 0x01 );	
	for(;;)
	{
		alarmCheck();
		LCD_Command(0x80);
		LCD_Print_Line("B4 HELP MENU ");
		LCD_Command(0xc0);
		LCD_Print_Line("HAVE A NICE DAY ");
		//--- PB1---//
		if(PB1==0)
		{
			b2=1;
		}
		if((PB1==1)&&(b2==1))
		{				
			Time();
			b2=0;
		}
		//--- PB2---//
		if(PB2==0)
		{
			setAlarm();
		}
		//--- PB3---//
		while(PB3==0)
		{
			stopwatch();
		} 
		//---PB4---//	
		while (PB4 == 0)
		{
			LCD_Command(0x01);
			for (;;)
			{
				alarmCheck();
				LCD_Command(0x80);
				LCD_Print_Line("B1 Time B2 Alarm");
				LCD_Command(0xc0);
				LCD_Print_Line("B2&3BL B3SW B5ET");

				//--- PB1---//
				if (PB1 == 0)
				{
				b2 = 1;
				}
				if ((PB1 == 1) && (b2 == 1))
				{	
					Time();
					b2 = 0;
				}
				//--- PB2---//
				if (PB2 == 0)
				{
					setAlarm();
				}
				//--- PB3---//
				
				if ((PB3 == 0)&&(PB2==0))
				{
					B0=1;
				}
				if ((PB3 == 1)&&(B0==1)&&(PB2==1))
				{
					BackLight();
					B0	=0;
				}
				 if (PB3==0)
				{
					b9=1;
				}
				if ((b9==1)&&(PB3==1))
				{
					stopwatch();
					b9	=0;
				}
		
				if ((PB5 == 0) && (b6 == 0))
				{
					b6 = 1;
				}
				if ((PB5 == 1) && (b6 == 1))
				{
					b6 = 0;
					LCD_Command(0x01);
					break;
				}
			}
		}
		
	}
}

