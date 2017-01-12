require 'spec_helper'

describe 'something' do
  before :all do
    visit "http://app"
    
    expect(page).to have_text("NEW ARRIVALS")
    
  end

  it 'should go to the product demo' do
    visit "http://app/blouses/2-blouse.html"
    
    expect(page).to have_text("Blouse")
  end

  it 'should add the product to shopping cart' do
    visit "http://app/blouses/2-blouse.html"
    click_on "Add to cart"
    click_on "Proceed to checkout"

    expect(page).to have_text("1 Product")    
  end

end
