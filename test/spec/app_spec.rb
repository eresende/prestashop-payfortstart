require 'spec_helper'

describe 'Activate Payfort Start plugin' do
  before :all do      
    visit "http://app/management"

    expect(page).to have_text("Stay logged in")

    fill_in "Email address", with: "demo@prestashop.com"
    fill_in "Password", with: "prestashop_demo"

    click_on "Log in"

    expect(page).to have_text("Dashboard")
  end


  it 'should activate and configure module Payfort Start' do

    visit "http://app/management/index.php?controller=AdminModules"
    expect(page).to have_text("List of modules")

    find(:xpath, '//*[@id="module-list"]/tbody/tr[137]/td[4]/div/div/a').click
    find(:xpath, '//*[@id="proceed-install-anyway"]').click    

    expect(page).to have_text("Configure")

    fill_in "PAYFORT_START_TEST_OPEN_KEY", with: "test_open_k_c3f462a1e8277114c1da"
    fill_in "PAYFORT_START_TEST_SECRET_KEY", with: "test_sec_k_16dc38ad730d6ba806a92"
    fill_in "PAYFORT_START_LIVE_OPEN_KEY", with: "test_open_k_c3f462a1e8277114c1da"
    fill_in "PAYFORT_START_LIVE_SECRET_KEY", with: "test_sec_k_16dc38ad730d6ba806a92"

    find(:xpath, '//*[@name="payfort_start_mode"][2]').click

    find('#payfort_start_hold_review_os').find(:xpath, 'option[9]').select_option

    click_on "Update settings"

    expect(page).to have_select('PAYFORT_START_HOLD_REVIEW_OS', selected: 'Payment accepted')

  end

end

# describe 'add product to cart' do
#   before :all do
#     visit "http://app"
    
#     expect(page).to have_text("NEW ARRIVALS")
    
#   end

#   it 'should go to the product demo' do
#     visit "http://app/blouses/2-blouse.html"
    
#     expect(page).to have_text("Blouse")
#   end

#   it 'should add the product to shopping cart' do
#     visit "http://app/blouses/2-blouse.html"
#     click_on "Add to cart"
#     click_on "Proceed to checkout"

#     expect(page).to have_text("1 Product")    
#   end

# end
