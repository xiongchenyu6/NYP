package activity;

import java.io.UnsupportedEncodingException;
import java.net.URLEncoder;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;

import org.apache.http.NameValuePair;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import com.nyp.edu.renthousesystem.R;

import database.JSONParser;

import android.app.Activity;
import android.app.AlertDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.os.Bundle;
import android.os.Handler;
import android.os.Looper;
import android.os.StrictMode;
import android.text.Editable;
import android.text.TextWatcher;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.EditText;
import android.widget.ListView;
import android.widget.Toast;
import android.widget.AdapterView.OnItemClickListener;

public class MessageActivity extends Activity
{	private ListView lv;
String selected="";
// Listview Adapter
ArrayAdapter<String> adapter;
int landlord_C=0;
// Search EditText
EditText inputSearch;
private String type;
String uri = null; 
private static String url_confirmation_findbylandlord = "http://192.168.1.17/chenyu/confirmation_findbylandlord.php?landlord=";
private static String url_confirmation_findbytenant = "http://192.168.1.17/chenyu/confirmation_findbytenant.php?tenant=";
private static String url_confirmation_updates = "http://192.168.1.17/chenyu/confirmation_updates.php?landlord=";

// ArrayList for Listview
ArrayList<HashMap<String, String>> productList;

@SuppressWarnings("null")
@Override
public void onCreate(Bundle savedInstanceState) {
    super.onCreate(savedInstanceState);
    setContentView(R.layout.activity_search);
  	StrictMode.ThreadPolicy policy = new StrictMode.ThreadPolicy.Builder().permitAll().build();
	StrictMode.setThreadPolicy(policy); 
	if(Info.TYPE.compareTo("Landlord")==0)
	{
		
		List<NameValuePair> params = new ArrayList<NameValuePair>();
	    JSONParser jsonParser1 = new JSONParser();
		  try{
		    	
		    	uri= url_confirmation_findbylandlord+
		    			URLEncoder.encode("\""+Info.TENANTNAME+"\"", "UTF-8");
			    Log.d("test", uri);
		    }   
		  catch(UnsupportedEncodingException e){ e.printStackTrace();}
	    String json1 = jsonParser1.makeHttpReques(uri, "POST", params);
	    Log.d("test", json1);
	    try {
			JSONObject jSONObject = new JSONObject(json1);
			JSONArray array = jSONObject.getJSONArray("users");
			String[]address = new String[(array.length())];
			  for (int i=0; i<array.length(); i++){
				  address[i] = array.getJSONObject(i).getString("tenant");
				  landlord_C=array.getJSONObject(i).getInt("landlord_C");
					lv = (ListView) findViewById(R.id.list_view);
					inputSearch = (EditText) findViewById(R.id.inputSearch);
					adapter = new ArrayAdapter<String>(this, R.layout.list_item, R.id.address_name,address);
					lv.setAdapter(adapter);
					inputSearch.addTextChangedListener(new TextWatcher()
					{			@Override
						
						
						
						public void onTextChanged(CharSequence cs, int arg1, int arg2, int arg3) {
						// When user changed the Text
						MessageActivity.this.adapter.getFilter().filter(cs);	
					}

					@Override
					public void beforeTextChanged(CharSequence arg0, int arg1, int arg2,
							int arg3) {
						// TODO Auto-generated method stub
						
					}

					@Override
					public void afterTextChanged(Editable arg0) {
						// TODO Auto-generated method stub							
					}
					});
			    
			  }			 
			  lv.setOnItemClickListener(new OnItemClickListener() {
                  
					
					public void onItemClick(AdapterView<?> arg0, View view,
							final int position, long id) {
			
						AlertDialog.Builder builder  =new AlertDialog.Builder(MessageActivity.this);
						if(landlord_C==0)
						{
							builder.setTitle("Comfrim").setMessage("Are you confrim to rent this houser").setPositiveButton("confrim",
									new DialogInterface.OnClickListener() {
										
										@Override
										public void onClick(DialogInterface arg0, int arg1) {
										  	StrictMode.ThreadPolicy policy = new StrictMode.ThreadPolicy.Builder().permitAll().build();
											StrictMode.setThreadPolicy(policy); 
											
											  try{
											    	
											    	uri= url_confirmation_updates+
											    			URLEncoder.encode("\""+Info.TENANTNAME+"\"", "UTF-8")+"&tenant="+
													    			URLEncoder.encode("\""+lv.getItemAtPosition(position).toString()+"\"", "UTF-8")+"&landlord_C=1";
											    	
											    }
											
											    catch(UnsupportedEncodingException e){ e.printStackTrace();}
												List<NameValuePair> params = new ArrayList<NameValuePair>();
											    JSONParser jsonParser1 = new JSONParser();
											    Log.d("test", uri);
											    String json1 = jsonParser1.makeHttpReques(uri, "POST", params);
											    Log.d("test", json1);
											    landlord_C=1;

									}}).setNegativeButton("back",new DialogInterface.OnClickListener() {
										
										@Override
										public void onClick(DialogInterface dialog, int which) {
											// TODO Auto-generated method stub
											finish();
										}}
									).show();
							
							
						}
						else
						{
							builder.setTitle("Comfrim").setMessage("Are you confrim to cancel the rent").setPositiveButton("confrim",
									new DialogInterface.OnClickListener() {
										
										@Override
										public void onClick(DialogInterface arg0, int arg1) {
										  	StrictMode.ThreadPolicy policy = new StrictMode.ThreadPolicy.Builder().permitAll().build();
											StrictMode.setThreadPolicy(policy); 
											
											  try{
											    	
											    	uri= url_confirmation_updates+
											    			URLEncoder.encode("\""+Info.TENANTNAME+"\"", "UTF-8")+"&tenant="+
													    			URLEncoder.encode("\""+lv.getItemAtPosition(position).toString()+"\"", "UTF-8")+"&landlord_C=0";
											    	
											    }
											
											    catch(UnsupportedEncodingException e){ e.printStackTrace();}
												List<NameValuePair> params = new ArrayList<NameValuePair>();
											    JSONParser jsonParser1 = new JSONParser();
											    Log.d("test", uri);
											    String json1 = jsonParser1.makeHttpReques(uri, "POST", params);
											    Log.d("test", json1);
											    landlord_C=0;

									}}).setNegativeButton("back",new DialogInterface.OnClickListener() {
										
										@Override
										public void onClick(DialogInterface dialog, int which) {
											// TODO Auto-generated method stub
											finish();
										}}
									).show();
							
							
						}
				
						
						
					}

	    });}catch (JSONException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}
		
		
		
	}else
	{
		List<NameValuePair> params = new ArrayList<NameValuePair>();
	    JSONParser jsonParser1 = new JSONParser();
		  try{
		    	
		    	uri= url_confirmation_findbytenant+
		    			URLEncoder.encode("\""+Info.TENANTNAME+"\"", "UTF-8");
		    	
		    }   
		  catch(UnsupportedEncodingException e){ e.printStackTrace();}
	    String json1 = jsonParser1.makeHttpReques(uri, "POST", params);
	    try {
			JSONObject jSONObject = new JSONObject(json1);
			JSONArray array = jSONObject.getJSONArray("users");
			String[]address = new String[(array.length())];
			  for (int i=0; i<array.length(); i++){
				  address[i] = array.getJSONObject(i).getString("landlord")+" Comfirm Status:"+array.getJSONObject(i).getInt("landlord_C");
					lv = (ListView) findViewById(R.id.list_view);
					inputSearch = (EditText) findViewById(R.id.inputSearch);
					adapter = new ArrayAdapter<String>(this, R.layout.list_item, R.id.address_name,address);
					lv.setAdapter(adapter);
					inputSearch.addTextChangedListener(new TextWatcher()
					{			@Override
						
						
						
						public void onTextChanged(CharSequence cs, int arg1, int arg2, int arg3) {
						// When user changed the Text
						MessageActivity.this.adapter.getFilter().filter(cs);	
					}

					@Override
					public void beforeTextChanged(CharSequence arg0, int arg1, int arg2,
							int arg3) {
						// TODO Auto-generated method stub
						
					}

					@Override
					public void afterTextChanged(Editable arg0) {
						// TODO Auto-generated method stub							
					}
					});
			    
			  }
	                 ;}catch (JSONException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}
		
	}



	}


}



