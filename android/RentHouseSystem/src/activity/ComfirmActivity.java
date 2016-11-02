package activity;

import java.io.UnsupportedEncodingException;
import java.net.URLEncoder;
import java.util.ArrayList;
import java.util.List;
import activity.Info;
import org.apache.http.NameValuePair;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;
import android.app.Activity;
import android.app.AlertDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.os.Handler;
import android.os.Looper;
import android.os.StrictMode;
import android.util.Log;
import android.view.View;
import android.widget.TextView;
import android.widget.Toast;

import com.nyp.edu.renthousesystem.R;
import database.JSONParser;
public class ComfirmActivity extends Activity {
	String place="";
 String uri = null; 
 int check;
 int number;
private static String url_all_price = "http://192.168.1.17/chenyu/db_readplace.php?place=";
private static String url_check = "http://192.168.1.17/chenyu/confirmation_check.php?tenant=";
private static String url_create = "http://192.168.1.17/chenyu/confirmation_create.php?tenant=";
	String[] info= new String[10];
	protected void onCreate(Bundle savedInstanceState) {
	super.onCreate(savedInstanceState);
	setContentView(R.layout.activity_comfirmation);
  	StrictMode.ThreadPolicy policy = new StrictMode.ThreadPolicy.Builder().permitAll().build();
	StrictMode.setThreadPolicy(policy); 
	  Bundle b =this.getIntent().getExtras();      
	  if(b !=null)	
	  {
		  place=b.getString("place");
		  place="\""+place+"\"";
		  try{
		    	
		    	uri= url_all_price+
		    			URLEncoder.encode(place, "UTF-8");
		    	
		    }
		   
		    catch(UnsupportedEncodingException e){ e.printStackTrace();}
			List<NameValuePair> params = new ArrayList<NameValuePair>();
		    JSONParser jsonParser1 = new JSONParser();
		    String json1 = jsonParser1.makeHttpReques(uri, "POST", params);
		    try {
				JSONObject jSONObject = new JSONObject(json1);
				JSONArray array = jSONObject.getJSONArray("users");
				info[0] = array.getJSONObject(0).getString("id");
				info[1] = array.getJSONObject(0).getString("username");
				info[2] = array.getJSONObject(0).getString("password");
				info[3] = array.getJSONObject(0).getString("sex");
				info[4] = array.getJSONObject(0).getString("age");
				info[5] = array.getJSONObject(0).getString("hobby");
				info[6] = array.getJSONObject(0).getString("place");
				info[7] = array.getJSONObject(0).getString("type");
				info[8] = array.getJSONObject(0).getString("number");
				number =array.getJSONObject(0).getInt("number");
				info[9] = array.getJSONObject(0).getString("email");
				TextView infomation = (TextView)findViewById(R.id.txtinfo);
				infomation.setText("info : "+info[0]+"\n"+info[1]+"\n"+info[3]+"\n"+info[4]+"\n"+info[5]+"\n"+info[6]+"\n"+info[7]+"\n"+info[8]+"\n"+info[9]);		  
	  }catch (JSONException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}

	  }
	  
	}
	
	public void call(View v) {	
        String numbe = "tel:" + number;
        Intent callIntent = new Intent(Intent.ACTION_CALL, Uri.parse(numbe)); 
        startActivity(callIntent);
	}	 	
	public void confirm(View v) {
		AlertDialog.Builder builder  =new AlertDialog.Builder(this);
		builder.setTitle("Comfrim").setMessage("Are you confrim to rent this houser").setPositiveButton("confrim",
		new DialogInterface.OnClickListener() {
			
			@Override
			public void onClick(DialogInterface arg0, int arg1) {
			  	StrictMode.ThreadPolicy policy = new StrictMode.ThreadPolicy.Builder().permitAll().build();
				StrictMode.setThreadPolicy(policy); 
				  try{
				    	
				    	uri= url_check+
				    			URLEncoder.encode("\""+Info.TENANTNAME+"\"", "UTF-8")+"&landlord="+
						    			URLEncoder.encode("\""+info[1]+"\"", "UTF-8");
				    	
				    }
				
				    catch(UnsupportedEncodingException e){ e.printStackTrace();}
					List<NameValuePair> params = new ArrayList<NameValuePair>();
				    JSONParser jsonParser1 = new JSONParser();
				    Log.d("test", uri);
				    String json1 = jsonParser1.makeHttpReques(uri, "POST", params);
				    Log.d("test", json1);
				    try {
						JSONObject jSONObject = new JSONObject(json1);
						if(jSONObject.getInt("success")==0)
						{							
							
							 try{
							    	
							    	uri= url_create+
							    			URLEncoder.encode(Info.TENANTNAME, "UTF-8")+"&landlord="+
									    			URLEncoder.encode(info[1], "UTF-8");
							    	
							    }
							   
							    catch(UnsupportedEncodingException e){ e.printStackTrace();}
							   
							    String json = jsonParser1.makeHttpReques(uri, "POST", params);
							    Log.d("test", json);
								Handler handler = new Handler(Looper.getMainLooper()); 

								handler.postDelayed(new Runnable() {
								  @Override
								public void run() {
								 Toast.makeText(getApplicationContext(), "Success", Toast.LENGTH_LONG).show();				
								  }
								}, 1000 );
							
							
						}
						else
						{
							Handler handler = new Handler(Looper.getMainLooper()); 

							handler.postDelayed(new Runnable() {
							  @Override
							public void run() {
							 Toast.makeText(getApplicationContext(), "Comfirmation exist", Toast.LENGTH_LONG).show();				
							  }
							}, 1000 );
							
						}
				
			
			}
				    catch (JSONException e) {
						// TODO Auto-generated catch block
						e.printStackTrace();
					}

		}}).setNegativeButton("back",new DialogInterface.OnClickListener() {
			
			@Override
			public void onClick(DialogInterface dialog, int which) {
				// TODO Auto-generated method stub
				finish();
			}}
		).show();
		
		
	}	 
	public void email(View v) {	
    	String email ="mailto:"+info[9];
   	 Intent emailIntent = new Intent(Intent.ACTION_SENDTO, Uri.parse(email)); 
           startActivity(emailIntent);
	}	 

}
